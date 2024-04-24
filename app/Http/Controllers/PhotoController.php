<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Voiture;
use Intervention\Image\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function voiture(Voiture $voiture)
    {
        $photos = Photo::select()->where('voiture_id', $voiture->id)->get();
        $photoPrincipale = Photo::select()->where('voiture_id', $voiture->id)->orderBy('principal','DESC')->first();
        $idPhotoPrincipale = $photoPrincipale->id;

        return view('photo.voiture', ['photos' => $photos, 'voiture'=> $voiture, 'photoPrincipale_id'=> $idPhotoPrincipale]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Voiture $voiture)
    {
        $photos = Photo::select()->where('voiture_id', $voiture->id)->get();
        $photoPrincipale = Photo::select()->where('voiture_id', $voiture->id)->orderBy('principal','DESC')->first();
        $idPhotoPrincipale = $photoPrincipale->id;

        $nbPhotos = Photo::select()->where('voiture_id',$voiture->id)->count();
        $nbNewPhotos = 10 - $nbPhotos;

        if ($nbNewPhotos > 0) 
        {
            return view('photo.create', ['voiture' => $voiture, 'nbNewPhotos' => $nbNewPhotos]);
        }
        else 
        {
            return redirect()->route('photo.voiture',['voiture'=>$voiture])->with('success', trans('No more than 10 photos'));

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Voiture $voiture)
    {
        $photoPrincipale = Photo::select()->where('voiture_id', $voiture->id)->orderBy('principal','DESC')->first();
        $idPhotoPrincipale = $photoPrincipale->id;

        $nbPhotos = Photo::select()->where('voiture_id',$voiture->id)->count();
        $nbNewPhotos = 10 - $nbPhotos;

        if (intval($nbNewPhotos) > 0)

        $request->validate([
            'photo' => 'required|array|max:'.$nbNewPhotos,
            'photo.*' => 'required|file|mimes:jpeg,jpg,png,gif,svg|max:5120|dimensions:min_width=1024',
        ]);

        // Création photos
        $newPhotos = $request->file('photo');

        foreach ($newPhotos as $i => $newPhoto) 
        {
            //Compresser images, ref: https://www.prashantwebdeveloper.in/laravel-image-compression-project/
            $photoName = time() . "_$i." . $newPhoto->getClientOriginalExtension();
            $imagepath = public_path('/assets/img/');
            $pathToOutput = public_path('/assets/img/voitures/');

            $newPhoto->move($imagepath, $photoName);
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($imagepath.$photoName,$pathToOutput.$photoName);
            unlink($imagepath.$photoName);

            // Redimensionner images ref: https://image.intervention.io/v3
            $manager = new ImageManager(new Driver());
            $image = $manager->read($pathToOutput.$photoName);
            $image->scale(width: 1024); // resize image proportionally to 1024px width
            $image->save($pathToOutput.$photoName);

            $photo = new Photo();
            $photo->nom = $photoName;
            $photo->principal = 0;
            $photo->voiture_id = $voiture->id;
            $photo->save();    
        }

        $photos = Photo::select()->where('voiture_id', $voiture->id)->get();

        return redirect()->route('photo.voiture',['voiture'=>$voiture])->with('success', trans('Photos added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function principal(Photo $photo)
    {
        $voiture = Voiture::select()->where('id',$photo->voiture_id )->first();
        $photos = Photo::select()->where('voiture_id', $photo->voiture_id)->get();
        $photoPrincipale = Photo::select()->where('voiture_id', $photo->voiture_id)->orderBy('principal','DESC')->first();
        $idPhotoPrincipale = $photoPrincipale->id;

        foreach ($photos as $chaquePhoto) 
        {
            if($chaquePhoto->id !== $photo->id )
            {
                $chaquePhoto->principal = 0;
            }
            else
            {
                $chaquePhoto->principal = 1;
            }
            $chaquePhoto->save();
        }

        return redirect()->route('photo.voiture',['voiture'=>$voiture]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $nbPhotos = Photo::select()->where('voiture_id',$photo->voiture_id)->count();
        $photos = Photo::select()->where('voiture_id', $photo->voiture_id)->get();
        $voiture = Voiture::select()->where('id',$photo->voiture_id )->first();

        if($nbPhotos > 1)
        {            
            $photo = Photo::select()->where('id', $photo->id)->first();

            if ($photo) {
                $photo->delete();
            }
            return redirect()->route('photo.voiture', ['voiture'=>$voiture])->with('success', trans('You\'ve deleted a photo successfully'));
        }
        else{
            return redirect()->route('photo.voiture', ['voiture'=>$voiture])->with('success', trans('There should be at leaset one photo'));
        }

    }
}
