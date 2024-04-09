--
-- Dumping data for table `carburants`
--

INSERT INTO `carburants` (`id`, `nom`) VALUES
(1, '{\"en\":\"Gas\",\"fr\":\"Essence\"}'),
(2, '{\"en\":\"Diesel\",\"fr\":\"Diesel\"}'),
(3, '{\"en\":\"Hybrid\",\"fr\":\"Hybride\"}'),
(4, '{\"en\":\"Electric\",\"fr\":\"Électrique\"}');

-- --------------------------------------------------------

--
-- Dumping data for table `carrosseries`
--

INSERT INTO `carrosseries` (`id`, `nom`) VALUES
(1, '{\"en\":\"Sedan\",\"fr\":\"Berline\"}'),
(2, '{\"en\":\"Coupe\",\"fr\":\"Coupé\"}'),
(3, '{\"en\":\"Hatchback\",\"fr\":\"Compacte\"}'),
(4, '{\"en\":\"SUV\",\"fr\":\"VUS\"}'),
(5, '{\"en\":\"Pickup\",\"fr\":\"Camionnette\"}'),
(6, '{\"en\":\"Convertible\",\"fr\":\"Cabriolet\"}'),
(7, '{\"en\":\"Minivan\",\"fr\":\"Monospace\"}'),
(8, '{\"en\":\"Crossover\",\"fr\":\"Crossover\"}');

-- --------------------------------------------------------

--
-- Dumping data for table `expeditions`
--

INSERT INTO `expeditions` (`id`, `created_at`, `updated_at`, `nom`) VALUES
(1, NULL, NULL, '{\"en\": \"Local Delivery with Fixed Price\", \"fr\": \"Livraison locale avec un prix fixe\"}'),
(2, NULL, NULL, '{\"en\": \"Customer Pickup\", \"fr\": \"Ramassage du client\"}');

-- --------------------------------------------------------

--
-- Dumping data for table `marques`
--

INSERT INTO `marques` (`id`, `nom`) VALUES
(1, 'Ford'),
(2, 'Chevrolet'),
(3, 'Toyota'),
(4, 'Honda'),
(5, 'Ram'),
(6, 'GMC'),
(7, 'Volkswagen'),
(8, 'Hyundai'),
(9, 'Nissan'),
(10, 'Jeep');

-- --------------------------------------------------------

INSERT INTO `modeles` (`id`, `nom`, `marque_id`) VALUES
(1, 'F-150', 1),
(2, 'Mustang', 1),
(3, 'Explorer', 1),
(4, 'Escape', 1),
(5, 'Focus', 1),
(6, 'Fusion', 1),
(7, 'Ranger', 1),
(8, 'Edge', 1),
(9, 'Expedition', 1),
(10, 'Bronco', 1),
(11, 'Silverado', 2),
(12, 'Camaro', 2),
(13, 'Equinox', 2),
(14, 'Tahoe', 2),
(15, 'Malibu', 2),
(16, 'Traverse', 2),
(17, 'Colorado', 2),
(18, 'Suburban', 2),
(19, 'Impala', 2),
(20, 'Trailblazer', 2),
(21, 'Corolla', 3),
(22, 'Camry', 3),
(23, 'RAV4', 3),
(24, 'Tacoma', 3),
(25, 'Highlander', 3),
(26, 'Prius', 3),
(27, '4Runner', 3),
(28, 'Tundra', 3),
(29, 'Sienna', 3),
(30, 'Avalon', 3),
(31, 'Civic', 4),
(32, 'Accord', 4),
(33, 'CR-V', 4),
(34, 'Pilot', 4),
(35, 'Odyssey', 4),
(36, 'HR-V', 4),
(37, 'Fit', 4),
(38, 'Ridgeline', 4),
(39, 'Passport', 4),
(40, 'Insight', 4),
(41, '1500', 5),
(42, '2500', 5),
(43, '3500', 5),
(44, 'ProMaster', 5),
(45, 'ProMaster City', 5),
(46, 'Rebel', 5),
(47, 'Power Wagon', 5),
(48, 'Chassis Cab', 5),
(49, 'Tradesman', 5),
(50, 'Laramie', 5),
(51, 'Sierra', 6),
(52, 'Acadia', 6),
(53, 'Terrain', 6),
(54, 'Yukon', 6),
(55, 'Canyon', 6),
(56, 'Savana', 6),
(57, 'Envoy', 6),
(58, 'Jimmy', 6),
(59, 'Syclone', 6),
(60, 'TopKick', 6),
(61, 'Jetta', 7),
(62, 'Golf', 7),
(63, 'Passat', 7),
(64, 'Tiguan', 7),
(65, 'Atlas', 7),
(66, 'Arteon', 7),
(67, 'Touareg', 7),
(68, 'ID.4', 7),
(69, 'Beetle', 7),
(70, 'CC', 7),
(71, 'Elantra', 8),
(72, 'Sonata', 8),
(73, 'Tucson', 8),
(74, 'Santa Fe', 8),
(75, 'Accent', 8),
(76, 'Palisade', 8),
(77, 'Kona', 8),
(78, 'Venue', 8),
(79, 'Veloster', 8),
(80, 'IONIQ', 8),
(81, 'Altima', 9),
(82, 'Rogue', 9),
(83, 'Sentra', 9),
(84, 'Frontier', 9),
(85, 'Pathfinder', 9),
(86, 'Murano', 9),
(87, 'Maxima', 9),
(88, 'Titan', 9),
(89, 'Versa', 9),
(90, 'Armada', 9),
(91, 'Wrangler', 10),
(92, 'Grand Cherokee', 10),
(93, 'Cherokee', 10),
(94, 'Compass', 10),
(95, 'Renegade', 10),
(96, 'Gladiator', 10),
(97, 'Patriot', 10),
(98, 'Commander', 10),
(99, 'Liberty', 10),
(100, 'Wagoneer', 10);

-- --------------------------------------------------------

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Cash\", \"fr\": \"Argent comptant\"}', NULL, NULL),
(2, '{\"en\": \"Credit Card\", \"fr\": \"Carte de crédit\"}', NULL, NULL),
(3, '{\"en\": \"Debit Card\", \"fr\": \"Carte de débit\"}', NULL, NULL),
(4, '{\"en\": \"Bank Transfer\", \"fr\": \"Virement bancaire\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, '{\"en\": \"Canada\", \"fr\": \"Canada\"}'),
(2, '{\"en\": \"United States\", \"fr\": \"États-Unis\"}');

-- --------------------------------------------------------

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `nom`) VALUES
(1, 'client'),
(2, 'employé'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Dumping data for table `provences`
--

INSERT INTO `provences` (`id`, `nom`, `pays_id`) VALUES
(1, '{\"en\": \"Alberta\", \"fr\": \"Alberta\"}', 1),
(2, '{\"en\": \"British Columbia\", \"fr\": \"Colombie-Britannique\"}', 1),
(3, '{\"en\": \"Manitoba\", \"fr\": \"Manitoba\"}', 1),
(4, '{\"en\": \"New Brunswick\", \"fr\": \"Nouveau-Brunswick\"}', 1),
(5, '{\"en\": \"Newfoundland and Labrador\", \"fr\": \"Terre-Neuve-et-Labrador\"}', 1),
(6, '{\"en\": \"Nova Scotia\", \"fr\": \"Nouvelle-Écosse\"}', 1),
(7, '{\"en\": \"Ontario\", \"fr\": \"Ontario\"}', 1),
(8, '{\"en\": \"Prince Edward Island\", \"fr\": \"Île-du-Prince-Édouard\"}', 1),
(9, '{\"en\": \"Quebec\", \"fr\": \"Québec\"}', 1),
(10, '{\"en\": \"Saskatchewan\", \"fr\": \"Saskatchewan\"}', 1),
(11, '{\"en\": \"Northwest Territories\", \"fr\": \"Territoires du Nord-Ouest\"}', 1),
(12, '{\"en\": \"Nunavut\", \"fr\": \"Nunavut\"}', 1),
(13, '{\"en\": \"Yukon\", \"fr\": \"Yukon\"}', 1),
(14, '{\"en\": \"Alabama\", \"fr\": \"Alabama\"}', 2),
(15, '{\"en\": \"Alaska\", \"fr\": \"Alaska\"}', 2),
(16, '{\"en\": \"Arizona\", \"fr\": \"Arizona\"}', 2),
(17, '{\"en\": \"Arkansas\", \"fr\": \"Arkansas\"}', 2),
(18, '{\"en\": \"California\", \"fr\": \"Californie\"}', 2),
(19, '{\"en\": \"Colorado\", \"fr\": \"Colorado\"}', 2),
(20, '{\"en\": \"Connecticut\", \"fr\": \"Connecticut\"}', 2),
(21, '{\"en\": \"Delaware\", \"fr\": \"Delaware\"}', 2),
(22, '{\"en\": \"Florida\", \"fr\": \"Floride\"}', 2),
(23, '{\"en\": \"Georgia\", \"fr\": \"Géorgie\"}', 2),
(24, '{\"en\": \"Hawaii\", \"fr\": \"Hawaï\"}', 2),
(25, '{\"en\": \"Idaho\", \"fr\": \"Idaho\"}', 2),
(26, '{\"en\": \"Illinois\", \"fr\": \"Illinois\"}', 2),
(27, '{\"en\": \"Indiana\", \"fr\": \"Indiana\"}', 2),
(28, '{\"en\": \"Iowa\", \"fr\": \"Iowa\"}', 2),
(29, '{\"en\": \"Kansas\", \"fr\": \"Kansas\"}', 2),
(30, '{\"en\": \"Kentucky\", \"fr\": \"Kentucky\"}', 2),
(31, '{\"en\": \"Louisiana\", \"fr\": \"Louisiane\"}', 2),
(32, '{\"en\": \"Maine\", \"fr\": \"Maine\"}', 2),
(33, '{\"en\": \"Maryland\", \"fr\": \"Maryland\"}', 2),
(34, '{\"en\": \"Massachusetts\", \"fr\": \"Massachusetts\"}', 2),
(35, '{\"en\": \"Michigan\", \"fr\": \"Michigan\"}', 2),
(36, '{\"en\": \"Minnesota\", \"fr\": \"Minnesota\"}', 2),
(37, '{\"en\": \"Mississippi\", \"fr\": \"Mississippi\"}', 2),
(38, '{\"en\": \"Missouri\", \"fr\": \"Missouri\"}', 2),
(39, '{\"en\": \"Montana\", \"fr\": \"Montana\"}', 2),
(40, '{\"en\": \"Nebraska\", \"fr\": \"Nebraska\"}', 2),
(41, '{\"en\": \"Nevada\", \"fr\": \"Nevada\"}', 2),
(42, '{\"en\": \"New Hampshire\", \"fr\": \"New Hampshire\"}', 2),
(43, '{\"en\": \"New Jersey\", \"fr\": \"New Jersey\"}', 2),
(44, '{\"en\": \"New Mexico\", \"fr\": \"Nouveau-Mexique\"}', 2),
(45, '{\"en\": \"New York\", \"fr\": \"New York\"}', 2),
(46, '{\"en\": \"North Carolina\", \"fr\": \"Caroline du Nord\"}', 2),
(47, '{\"en\": \"North Dakota\", \"fr\": \"Dakota du Nord\"}', 2),
(48, '{\"en\": \"Ohio\", \"fr\": \"Ohio\"}', 2),
(49, '{\"en\": \"Oklahoma\", \"fr\": \"Oklahoma\"}', 2),
(50, '{\"en\": \"Oregon\", \"fr\": \"Oregon\"}', 2),
(51, '{\"en\": \"Pennsylvania\", \"fr\": \"Pennsylvanie\"}', 2),
(52, '{\"en\": \"Rhode Island\", \"fr\": \"Rhode Island\"}', 2),
(53, '{\"en\": \"South Carolina\", \"fr\": \"Caroline du Sud\"}', 2),
(54, '{\"en\": \"South Dakota\", \"fr\": \"Dakota du Sud\"}', 2),
(55, '{\"en\": \"Tennessee\", \"fr\": \"Tennessee\"}', 2),
(56, '{\"en\": \"Texas\", \"fr\": \"Texas\"}', 2),
(57, '{\"en\": \"Utah\", \"fr\": \"Utah\"}', 2),
(58, '{\"en\": \"Vermont\", \"fr\": \"Vermont\"}', 2),
(59, '{\"en\": \"Virginia\", \"fr\": \"Virginie\"}', 2),
(60, '{\"en\": \"Washington\", \"fr\": \"Washington\"}', 2),
(61, '{\"en\": \"West Virginia\", \"fr\": \"Virginie-Occidentale\"}', 2),
(62, '{\"en\": \"Wisconsin\", \"fr\": \"Wisconsin\"}', 2),
(63, '{\"en\": \"Wyoming\", \"fr\": \"Wyoming\"}', 2);

-- --------------------------------------------------------

--
-- Dumping data for table `statuts`
--

INSERT INTO `statuts` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Pending\", \"fr\": \"En attente\"}', NULL, NULL),
(2, '{\"en\": \"Reserved\", \"fr\": \"Réservé\"}', NULL, NULL),
(3, '{\"en\": \"Invoiced\", \"fr\": \"Facturé\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `tractions`
--

INSERT INTO `tractions` (`id`, `nom`) VALUES
(1, '{\"en\":\"Front-wheel drive\",\"fr\":\"Traction avant\"}'),
(2, '{\"en\":\"Rear-wheel drive\",\"fr\":\"Propulsion arrière\"}'),
(3, '{\"en\":\"All-wheel drive\",\"fr\":\"Traction intégrale\"}'),
(4, '{\"en\":\"Four-wheel drive\",\"fr\":\"Quatre roues motrices\"}');

-- --------------------------------------------------------

--
-- Dumping data for table `transmissions`
--

INSERT INTO `transmissions` (`id`, `nom`) VALUES
(1, '{\"en\":\"Manual\",\"fr\":\"Manuelle\"}'),
(2, '{\"en\":\"Automatic\",\"fr\":\"Automatique\"}');

-- --------------------------------------------------------

--
-- Dumping data for table `villes`
--

-- Alberta (provence_id = 1)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Calgary", "fr": "Calgary"}', 1),
    ('{"en": "Edmonton", "fr": "Edmonton"}', 1),
    ('{"en": "Red Deer", "fr": "Red Deer"}', 1),
    ('{"en": "Lethbridge", "fr": "Lethbridge"}', 1),
    ('{"en": "Medicine Hat", "fr": "Medicine Hat"}', 1),
    ('{"en": "Airdrie", "fr": "Airdrie"}', 1),
    ('{"en": "St. Albert", "fr": "St. Albert"}', 1),
    ('{"en": "Grande Prairie", "fr": "Grande Prairie"}', 1),
    ('{"en": "Fort McMurray", "fr": "Fort McMurray"}', 1),
    ('{"en": "Chestermere", "fr": "Chestermere"}', 1);

-- British Columbia (provence_id = 2)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Vancouver", "fr": "Vancouver"}', 2),
    ('{"en": "Surrey", "fr": "Surrey"}', 2),
    ('{"en": "Burnaby", "fr": "Burnaby"}', 2),
    ('{"en": "Richmond", "fr": "Richmond"}', 2),
    ('{"en": "Kelowna", "fr": "Kelowna"}', 2),
    ('{"en": "Victoria", "fr": "Victoria"}', 2),
    ('{"en": "Abbotsford", "fr": "Abbotsford"}', 2),
    ('{"en": "Nanaimo", "fr": "Nanaimo"}', 2),
    ('{"en": "Kamloops", "fr": "Kamloops"}', 2),
    ('{"en": "Langley", "fr": "Langley"}', 2);

-- Manitoba (provence_id = 3)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Winnipeg", "fr": "Winnipeg"}', 3),
    ('{"en": "Brandon", "fr": "Brandon"}', 3),
    ('{"en": "Steinbach", "fr": "Steinbach"}', 3),
    ('{"en": "Portage la Prairie", "fr": "Portage la Prairie"}', 3),
    ('{"en": "Thompson", "fr": "Thompson"}', 3),
    ('{"en": "Selkirk", "fr": "Selkirk"}', 3),
    ('{"en": "Dauphin", "fr": "Dauphin"}', 3),
    ('{"en": "Morden", "fr": "Morden"}', 3),
    ('{"en": "The Pas", "fr": "The Pas"}', 3),
    ('{"en": "Flin Flon", "fr": "Flin Flon"}', 3);

-- New Brunswick (provence_id = 4)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Saint John", "fr": "Saint John"}', 4),
    ('{"en": "Moncton", "fr": "Moncton"}', 4),
    ('{"en": "Fredericton", "fr": "Fredericton"}', 4),
    ('{"en": "Dieppe", "fr": "Dieppe"}', 4),
    ('{"en": "Miramichi", "fr": "Miramichi"}', 4),
    ('{"en": "Edmundston", "fr": "Edmundston"}', 4),
    ('{"en": "Bathurst", "fr": "Bathurst"}', 4),
    ('{"en": "Campbellton", "fr": "Campbellton"}', 4),
    ('{"en": "Oromocto", "fr": "Oromocto"}', 4),
    ('{"en": "Grand Falls", "fr": "Grand Falls"}', 4);

-- Labrador (provence_id = 5)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "St. John''s", "fr": "St. John''s"}', 5),
    ('{"en": "Mount Pearl", "fr": "Mount Pearl"}', 5),
    ('{"en": "Corner Brook", "fr": "Corner Brook"}', 5),
    ('{"en": "Grand Falls-Windsor", "fr": "Grand Falls-Windsor"}', 5),
    ('{"en": "Labrador City", "fr": "Labrador City"}', 5);

-- Nova Scotia (provence_id = 6)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Halifax", "fr": "Halifax"}', 6),
    ('{"en": "Dartmouth", "fr": "Dartmouth"}', 6),
    ('{"en": "Sydney", "fr": "Sydney"}', 6),
    ('{"en": "Truro", "fr": "Truro"}', 6),
    ('{"en": "New Glasgow", "fr": "New Glasgow"}', 6),
    ('{"en": "Bridgewater", "fr": "Bridgewater"}', 6),
    ('{"en": "Kentville", "fr": "Kentville"}', 6),
    ('{"en": "Amherst", "fr": "Amherst"}', 6),
    ('{"en": "Yarmouth", "fr": "Yarmouth"}', 6),
    ('{"en": "Antigonish", "fr": "Antigonish"}', 6);

-- Ontario (provence_id = 7)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Toronto", "fr": "Toronto"}', 7),
    ('{"en": "Ottawa", "fr": "Ottawa"}', 7),
    ('{"en": "Mississauga", "fr": "Mississauga"}', 7),
    ('{"en": "Brampton", "fr": "Brampton"}', 7),
    ('{"en": "Hamilton", "fr": "Hamilton"}', 7),
    ('{"en": "London", "fr": "London"}', 7),
    ('{"en": "Markham", "fr": "Markham"}', 7),
    ('{"en": "Vaughan", "fr": "Vaughan"}', 7),
    ('{"en": "Kitchener", "fr": "Kitchener"}', 7),
    ('{"en": "Windsor", "fr": "Windsor"}', 7);

-- Prince Edward Island (provence_id = 8)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Charlottetown", "fr": "Charlottetown"}', 8),
    ('{"en": "Summerside", "fr": "Summerside"}', 8),
    ('{"en": "Stratford", "fr": "Stratford"}', 8),
    ('{"en": "Cornwall", "fr": "Cornwall"}', 8),
    ('{"en": "Montague", "fr": "Montague"}', 8),
    ('{"en": "Kensington", "fr": "Kensington"}', 8),
    ('{"en": "Souris", "fr": "Souris"}', 8),
    ('{"en": "Alberton", "fr": "Alberton"}', 8),
    ('{"en": "Tignish", "fr": "Tignish"}', 8),
    ('{"en": "Georgetown", "fr": "Georgetown"}', 8);

-- Quebec (provence_id = 9)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Montreal", "fr": "Montréal"}', 9),
    ('{"en": "Quebec City", "fr": "Ville de Québec"}', 9),
    ('{"en": "Laval", "fr": "Laval"}', 9),
    ('{"en": "Gatineau", "fr": "Gatineau"}', 9),
    ('{"en": "Longueuil", "fr": "Longueuil"}', 9),
    ('{"en": "Sherbrooke", "fr": "Sherbrooke"}', 9),
    ('{"en": "Saguenay", "fr": "Saguenay"}', 9),
    ('{"en": "Levis", "fr": "Lévis"}', 9),
    ('{"en": "Trois-Rivières", "fr": "Trois-Rivières"}', 9),
    ('{"en": "Terrebonne", "fr": "Terrebonne"}', 9),
    ('{"en": "Saint-Jean-sur-Richelieu", "fr": "Saint-Jean-sur-Richelieu"}', 9),
    ('{"en": "Repentigny", "fr": "Repentigny"}', 9),
    ('{"en": "Brossard", "fr": "Brossard"}', 9),
    ('{"en": "Drummondville", "fr": "Drummondville"}', 9),
    ('{"en": "Saint-Jérôme", "fr": "Saint-Jérôme"}', 9),
    ('{"en": "Granby", "fr": "Granby"}', 9),
    ('{"en": "Shawinigan", "fr": "Shawinigan"}', 9),
    ('{"en": "Saint-Hyacinthe", "fr": "Saint-Hyacinthe"}', 9),
    ('{"en": "Beloeil", "fr": "Beloeil"}', 9),
    ('{"en": "Châteauguay", "fr": "Châteauguay"}', 9);


-- Saskatchewan (provence_id = 10)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Saskatoon", "fr": "Saskatoon"}', 10),
    ('{"en": "Regina", "fr": "Regina"}', 10),
    ('{"en": "Prince Albert", "fr": "Prince Albert"}', 10),
    ('{"en": "Moose Jaw", "fr": "Moose Jaw"}', 10),
    ('{"en": "Yorkton", "fr": "Yorkton"}', 10),
    ('{"en": "Swift Current", "fr": "Swift Current"}', 10),
    ('{"en": "North Battleford", "fr": "North Battleford"}', 10),
    ('{"en": "Estevan", "fr": "Estevan"}', 10),
    ('{"en": "Weyburn", "fr": "Weyburn"}', 10),
    ('{"en": "Lloydminster", "fr": "Lloydminster"}', 10);

-- Northwest Territories (provence_id = 11)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Yellowknife", "fr": "Yellowknife"}', 11);

-- Nunavut (provence_id = 12)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Iqaluit", "fr": "Iqaluit"}', 12);

-- Yukon (provence_id = 13)
INSERT INTO villes (nom, provence_id) VALUES
    ('{"en": "Whitehorse", "fr": "Whitehorse"}', 13);


--
-- Dumping data for table `taxes`
-- 

INSERT INTO federal_taxes (nom, valeur, provence_id) 
VALUES 
-- Alberta
('GST/HST', 5.0, 1),

-- British Columbia
('GST/HST', 5.0, 2),

-- Manitoba
('GST/HST', 5.0, 3),

-- New Brunswick
('GST/HST', 15.0, 4),

-- Newfoundland and Labrador
('GST/HST', 15.0, 5),

-- Nova Scotia
('GST/HST', 15.0, 6),

-- Ontario
('GST/HST', 13.0, 7),

-- Prince Edward Island
('GST/HST', 15.0, 8),

-- Quebec
('GST/HST', 5.0, 9),

-- Saskatchewan
('GST/HST', 5.0, 10),

-- Northwest Territories
('GST/HST', 5.0, 11),

-- Nunavut
('GST/HST', 5.0, 12),

-- Yukon
('GST/HST', 5.0, 13),


INSERT INTO provincial_taxes (nom, valeur, provence_id) 
VALUES 
-- Alberta
('PST/RST/QST', 0.0, 1),

-- British Columbia
('PST/RST/QST', 7.0, 2),

-- Manitoba
('PST/RST/QST', 7.0, 3),

-- New Brunswick
('PST/RST/QST', 0.0, 4),

-- Newfoundland and Labrador
('PST/RST/QST', 0.0, 5),

-- Nova Scotia
('PST/RST/QST', 0.0, 6),

-- Ontario
('PST/RST/QST', 0.0, 7),

-- Prince Edward Island
('PST/RST/QST', 0.0, 8),

-- Quebec
('PST/RST/QST', 9.975, 9),

-- Saskatchewan
('PST/RST/QST', 6.0, 10),

-- Northwest Territories
('PST/RST/QST', 0.0, 11),

-- Nunavut
('PST/RST/QST', 0.0, 12),

-- Yukon
('PST/RST/QST', 0.0, 13);