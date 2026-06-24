-- ============================================================
--  FOODIE - Food Delivery App | Complete Database WITH FULL DATA
--  Database: fooddb
--  Version: 2.0 - FULL DATA FILLED
-- ============================================================

CREATE DATABASE IF NOT EXISTS `fooddb` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `fooddb`;

-- ============================================================
-- TABLE 1: signup (Users)
-- ============================================================
CREATE TABLE IF NOT EXISTS `signup` (
    `id`         INT(11) NOT NULL AUTO_INCREMENT,
    `fname`      VARCHAR(100) NOT NULL,
    `lname`      VARCHAR(100) NOT NULL,
    `uname`      VARCHAR(100) NOT NULL,
    `mob`        VARCHAR(15) NOT NULL,
    `email`      VARCHAR(150) NOT NULL UNIQUE,
    `pass`       VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `signup` (`fname`, `lname`, `uname`, `mob`, `email`, `pass`, `created_at`) VALUES
('Rahul',    'Sharma',   'rahul_s',    '9876541001', 'rahul.sharma@gmail.com',    'rahul123',    '2024-01-05 10:00:00'),
('Priya',    'Verma',    'priya_v',    '9876541002', 'priya.verma@gmail.com',     'priya123',    '2024-01-07 11:30:00'),
('Amit',     'Singh',    'amit_singh', '9876541003', 'amit.singh@gmail.com',      'amit123',     '2024-01-10 09:15:00'),
('Sneha',    'Gupta',    'sneha_g',    '9876541004', 'sneha.gupta@gmail.com',     'sneha123',    '2024-01-12 14:00:00'),
('Rohan',    'Joshi',    'rohan_j',    '9876541005', 'rohan.joshi@gmail.com',     'rohan123',    '2024-01-15 08:45:00'),
('Ananya',   'Mishra',   'ananya_m',   '9876541006', 'ananya.mishra@gmail.com',   'ananya123',   '2024-01-18 13:20:00'),
('Vikram',   'Yadav',    'vikram_y',   '9876541007', 'vikram.yadav@gmail.com',    'vikram123',   '2024-01-20 16:10:00'),
('Kavya',    'Tiwari',   'kavya_t',    '9876541008', 'kavya.tiwari@gmail.com',    'kavya123',    '2024-01-22 10:30:00'),
('Arjun',    'Pandey',   'arjun_p',    '9876541009', 'arjun.pandey@gmail.com',    'arjun123',    '2024-01-25 12:00:00'),
('Divya',    'Saxena',   'divya_s',    '9876541010', 'divya.saxena@gmail.com',    'divya123',    '2024-01-28 09:00:00'),
('Manish',   'Kumar',    'manish_k',   '9876541011', 'manish.kumar@gmail.com',    'manish123',   '2024-02-01 11:00:00'),
('Pooja',    'Agarwal',  'pooja_a',    '9876541012', 'pooja.agarwal@gmail.com',   'pooja123',    '2024-02-03 15:00:00'),
('Saurabh',  'Dubey',    'saurabh_d',  '9876541013', 'saurabh.dubey@gmail.com',   'saurabh123',  '2024-02-05 10:45:00'),
('Ritu',     'Shukla',   'ritu_sh',    '9876541014', 'ritu.shukla@gmail.com',     'ritu123',     '2024-02-08 14:30:00'),
('Nikhil',   'Trivedi',  'nikhil_t',   '9876541015', 'nikhil.trivedi@gmail.com',  'nikhil123',   '2024-02-10 08:00:00'),
('Sakshi',   'Chaurasia','sakshi_c',   '9876541016', 'sakshi.chaurasia@gmail.com','sakshi123',   '2024-02-12 17:00:00'),
('Deepak',   'Pathak',   'deepak_p',   '9876541017', 'deepak.pathak@gmail.com',   'deepak123',   '2024-02-15 09:30:00'),
('Ankita',   'Srivastava','ankita_sr', '9876541018', 'ankita.sri@gmail.com',      'ankita123',   '2024-02-17 11:15:00'),
('Gaurav',   'Bajpai',   'gaurav_b',   '9876541019', 'gaurav.bajpai@gmail.com',   'gaurav123',   '2024-02-20 13:00:00'),
('Shreya',   'Chauhan',  'shreya_c',   '9876541020', 'shreya.chauhan@gmail.com',  'shreya123',   '2024-02-22 16:45:00');

-- ============================================================
-- TABLE 2: admin
-- ============================================================
CREATE TABLE IF NOT EXISTS `admin` (
    `id`       INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`username`, `password`) VALUES
('admin',      'admin123'),
('superadmin', 'super@2024'),
('manager',    'manager@123');

-- ============================================================
-- TABLE 3: restaurants
-- ============================================================
CREATE TABLE IF NOT EXISTS `restaurants` (
    `id`          INT(11) NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(200) NOT NULL,
    `rating`      DECIMAL(2,1) DEFAULT 0.0,
    `image`       VARCHAR(300) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `about`       TEXT DEFAULT NULL,
    `location`    VARCHAR(300) DEFAULT NULL,
    `timing`      VARCHAR(100) DEFAULT NULL,
    `contact`     VARCHAR(20) DEFAULT NULL,
    `type`        VARCHAR(100) DEFAULT NULL,
    `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `restaurants` (`name`, `rating`, `image`, `description`, `about`, `location`, `timing`, `contact`, `type`) VALUES
('Spice Garden',         4.5, 'https://loremflickr.com/700/450/indian,curry',  'Authentic North Indian Cuisine',        'Lucknow ka sabse purana aur mashoor restaurant, 1990 se khul raha hai. Inka biryani aur kebab dono lajawaab hain.',   'Hazratganj, Lucknow, UP',       '10:00 AM - 11:00 PM', '9876543201', 'Veg, Non-Veg'),
('Burger Hub',           4.2, 'https://loremflickr.com/700/450/burger',  'Fresh & Crispy Burgers Daily',          'Burgers, wraps aur shakes ki duniya. Sab kuch fresh ingredients se bana, roze subah bakery se bread aata hai.',       'Gomti Nagar, Lucknow, UP',      '11:00 AM - 12:00 AM', '9876543202', 'Non-Veg'),
('Pizza Palace',         4.3, 'https://loremflickr.com/700/450/pizza',  'Wood-Fired Authentic Pizzas',           'Italian style pizza aur pasta ka ghar. Wood-fired oven mein pakaya jaata hai, cheesy aur crispy guaranteed.',        'Alambagh, Lucknow, UP',         '12:00 PM - 11:00 PM', '9876543203', 'Veg, Non-Veg'),
('Dosa Darbar',          4.6, 'https://loremflickr.com/700/450/dosa,indian',  'South Indian Delight in Lucknow',       'Crispy dosa, idli, vada aur sambar. Asli South Indian recipe ka swad Lucknow mein. Chef Chennai se aaye hain.',       'Indira Nagar, Lucknow, UP',     '07:00 AM - 10:00 PM', '9876543204', 'Pure Veg'),
('Momo Magic',           4.4, 'https://loremflickr.com/700/450/dumpling,momos',  'Tibetan & Chinese Momos Hub',           'Steam, fried aur tandoori momos ki 30+ varieties. Street food ka asli maza, original Nepali chutney ke saath.',       'Chowk, Lucknow, UP',            '12:00 PM - 11:30 PM', '9876543205', 'Veg, Non-Veg'),
('The Kebab Corner',     4.7, 'https://loremflickr.com/700/450/kebab,grill',  'Lucknow ke Mashoor Kebab',              'Galouti, Seekh, Shami aur Boti kebab. Nawabi style mein bana, koyle ki aag par pakaya. Lucknow ki shaan.',            'Aminabad, Lucknow, UP',         '06:00 PM - 02:00 AM', '9876543206', 'Non-Veg'),
('Thali Express',        4.1, 'https://loremflickr.com/700/450/thali,indian',  'Pure Veg Rajasthani & Gujarati Thali', 'Unlimited thali mein dal, sabji, roti, chawal, papad, achaar aur meetha. Sehat aur swad dono ek saath.',             'Aliganj, Lucknow, UP',          '11:00 AM - 04:00 PM', '9876543207', 'Pure Veg'),
('Noodle Nation',        4.0, 'https://loremflickr.com/700/450/noodles,asian',  'Chinese & Thai Food Lovers Place',      'Hakka noodles, fried rice, manchurian, soups aur dimsums. Indo-Chinese ka poora maza ek jagah.',                      'Vikas Nagar, Lucknow, UP',      '01:00 PM - 11:00 PM', '9876543208', 'Veg, Non-Veg'),
('Sweet Cravings',       4.3, 'https://loremflickr.com/700/450/dessert,cake',  'Desserts, Cakes & Ice Creams',          '100+ flavors ki ice cream, pastries, cakes, brownies aur waffles. Birthday parties ke liye special cakes bhi milte.',   'Mall Avenue, Lucknow, UP',      '10:00 AM - 11:00 PM', '9876543209', 'Pure Veg'),
('Chole Bhature House',  4.5, 'https://loremflickr.com/700/450/cholebhature,indian', 'Punjabi Chole Bhature ka Asli Swad',   'Subah 7 baje se shuru hote hain aur jab tak chole rahen tab tak. Delhi wala taste yahan milta hai.',                 'Krishna Nagar, Lucknow, UP',    '07:00 AM - 02:00 PM', '9876543210', 'Pure Veg'),
('Paneer Paradise',      4.2, 'https://loremflickr.com/700/450/paneer,curry', 'Veg & Paneer Specialities',             'Shahi paneer, palak paneer, paneer tikka aur 20+ paneer dishes. Dairy farm se fresh paneer aata hai roz.',             'Rajajipuram, Lucknow, UP',      '11:00 AM - 10:30 PM', '9876543211', 'Pure Veg'),
('Biryani Baadshah',     4.8, 'https://loremflickr.com/700/450/biryani', 'Lucknow ki No.1 Biryani',               'Lucknawi dum biryani, kacchi biryani aur mutton biryani. 50 saal purani recipe, 3rd generation chal rahi hai.',        'Hazratganj, Lucknow, UP',       '12:00 PM - 11:00 PM', '9876543212', 'Veg, Non-Veg'),
('Fast Food Factory',    3.9, 'https://loremflickr.com/700/450/streetfood,snack', 'Quick Bites & Street Food',             'Samosa, kachori, chaat, papdi, pani puri aur bhel puri. Students ka favorite hangout spot.',                          'University Road, Lucknow, UP',  '09:00 AM - 11:00 PM', '9876543213', 'Pure Veg'),
('Chicken Central',      4.4, 'https://loremflickr.com/700/450/chicken,grill', 'Grilled & Fried Chicken Experts',       'Grilled chicken, chicken wings, fried chicken aur tandoori chicken. Marinates 24 ghante karte hain.',                 'Sahara Ganj, Lucknow, UP',      '12:00 PM - 12:00 AM', '9876543214', 'Non-Veg'),
('Royal Dining',         4.6, 'https://loremflickr.com/700/450/finedining,restaurant', 'Fine Dining Nawabi Experience',         'Nawabi cuisine ka best experience. Dum pukht cooking, silver tableware aur royal ambience. Special occasions ke liye.', 'Butler Palace, Lucknow, UP',    '07:00 PM - 11:00 PM', '9876543215', 'Veg, Non-Veg');

-- ============================================================
-- TABLE 4: biryanis (All Food Items)
-- ============================================================
CREATE TABLE IF NOT EXISTS `biryanis` (
    `id`          INT(11) NOT NULL AUTO_INCREMENT,
    `food_name`   VARCHAR(200) NOT NULL,
    `image`       VARCHAR(300) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `price`       DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `offer_price` DECIMAL(10,2) DEFAULT 0.00,
    `category`    VARCHAR(100) DEFAULT 'biryani',
    `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `biryanis` (`food_name`, `image`, `description`, `price`, `offer_price`, `category`) VALUES

-- BIRYANI (10 items)
('Chicken Biryani',           'https://loremflickr.com/400/300/chicken,biryani',       'Hyderabadi dum style biryani, basmati rice aur juicy chicken ke saath, kesar aur rose water ka aroma',                  299.00, 249.00, 'biryani'),
('Mutton Biryani',            'https://loremflickr.com/400/300/mutton,biryani',        'Gosht ki kacchi biryani, tender mutton pieces dum mein slow-cooked, sautéed onions aur desi ghee ke saath',              379.00, 319.00, 'biryani'),
('Veg Dum Biryani',           'https://loremflickr.com/400/300/vegetable,biryani',           'Fresh vegetables aur basmati rice ka meetha milan, mint leaves aur fried onions ke saath served',                        199.00, 169.00, 'biryani'),
('Egg Biryani',               'https://loremflickr.com/400/300/egg,biryani',           'Masaledar ande aur basmati rice, zaffran ka rang aur desi tadka, garam masala ki khushboo',                              229.00, 189.00, 'biryani'),
('Paneer Biryani',            'https://loremflickr.com/400/300/paneer,biryani',        'Malai paneer aur aromatic basmati, green cardamom aur star anise se flavored, raita ke saath served',                    249.00, 209.00, 'biryani'),
('Prawn Biryani',             'https://loremflickr.com/400/300/prawn,biryani',         'Fresh prawns marinated in spices, dum style rice with coconut milk touch, coastal flavour',                               349.00, 299.00, 'biryani'),
('Fish Biryani',              'https://loremflickr.com/400/300/fish,biryani',          'Rohu fish pieces with turmeric aur chilli marination, long grain rice layered perfectly',                                 329.00, 279.00, 'biryani'),
('Lucknawi Biryani',          'https://loremflickr.com/400/300/biryani,rice',      'Nawabi style biryani, subtle spices aur attardar khushboo, authentic Awadhi tradition',                                  339.00, 289.00, 'biryani'),
('Mushroom Biryani',          'https://loremflickr.com/400/300/mushroom,biryani',      'Button mushrooms aur baby corn ki biryani, earthy flavour aur green coriander ki garnishing',                             219.00, 179.00, 'biryani'),
('Soya Biryani',              'https://loremflickr.com/400/300/biryani,rice',          'High protein soya chunks biryani, jeera rice base, healthy aur masaledar combination',                                   189.00, 159.00, 'biryani'),

-- BURGER (10 items)
('Classic Cheese Burger',     'https://loremflickr.com/400/300/cheese,burger',         'Juicy beef-style patty, cheddar cheese slice, lettuce, tomato aur special sauce, toasted bun mein',                     199.00, 159.00, 'burger'),
('Chicken Crispy Burger',     'https://loremflickr.com/400/300/chicken,burger', 'Crispy fried chicken fillet, coleslaw, pickles aur mayo, golden brown bun ke saath',                                    179.00, 149.00, 'burger'),
('Veg Burger',                'https://loremflickr.com/400/300/veggie,burger',            'Aloo-matar ki tikki, fresh veggies, green chutney aur tomato sauce, healthy aur tasty',                                  129.00, 99.00,  'burger'),
('BBQ Chicken Burger',        'https://loremflickr.com/400/300/bbq,burger',            'Grilled chicken patty marinated in BBQ sauce, caramelized onions, jalapenos aur smoked cheese',                          219.00, 179.00, 'burger'),
('Double Decker Burger',      'https://loremflickr.com/400/300/double,burger',         'Double patty, double cheese, double fun. Lettuce, onion rings, secret sauce aur gherkins',                               259.00, 219.00, 'burger'),
('Paneer Tikka Burger',       'https://loremflickr.com/400/300/burger,sandwich',         'Tandoori paneer tikka pieces in a bun, mint chutney aur onion rings, desi twist to burger',                              169.00, 139.00, 'burger'),
('Mushroom Swiss Burger',     'https://loremflickr.com/400/300/mushroom,burger',       'Sautéed mushrooms, Swiss cheese, garlic aioli aur arugula leaves mein packed',                                           189.00, 159.00, 'burger'),
('Spicy Chicken Burger',      'https://loremflickr.com/400/300/spicy,burger',          'Extra spicy chicken patty, ghost pepper sauce, jalapeños aur cooling ranch dressing',                                    199.00, 169.00, 'burger'),
('Fish Fillet Burger',        'https://loremflickr.com/400/300/fish,burger',           'Crispy fish fillet, tartar sauce, shredded cabbage aur lemon slice',                                                     189.00, 159.00, 'burger'),
('Kids Burger',               'https://loremflickr.com/400/300/burger,fries',           'Chota aur pyara burger, sweet sauce aur cheese, bacchon ki favorite pick',                                               99.00,  79.00,  'burger'),

-- PIZZA (10 items)
('Margherita Pizza',          'https://loremflickr.com/400/300/margherita,pizza',            'Classic Italian pizza, San Marzano tomato sauce, fresh mozzarella aur basil leaves, wood-fired',                         299.00, 249.00, 'pizza'),
('Chicken Tikka Pizza',       'https://loremflickr.com/400/300/chicken,pizza',   'Tandoori chicken tikka, bell peppers, red onions, mozzarella aur tikka sauce base',                                      349.00, 299.00, 'pizza'),
('Farmhouse Pizza',           'https://loremflickr.com/400/300/vegetable,pizza',       'Fresh capsicum, mushroom, onion, tomato, sweet corn aur paneer chunks, loaded veggie pizza',                              319.00, 269.00, 'pizza'),
('BBQ Chicken Pizza',         'https://loremflickr.com/400/300/bbq,pizza',             'Grilled chicken, BBQ sauce base, red onions, coriander aur smoked cheese blend',                                         369.00, 319.00, 'pizza'),
('Pepperoni Pizza',           'https://loremflickr.com/400/300/pepperoni,pizza',       'Classic pepperoni slices, tomato sauce, mozzarella aur oregano, American style pizza',                                   379.00, 329.00, 'pizza'),
('Paneer Makhani Pizza',      'https://loremflickr.com/400/300/cheese,pizza',          'Makhani gravy base, paneer cubes, onions, capsicum aur fresh cream drizzle',                                             329.00, 279.00, 'pizza'),
('Double Cheese Pizza',       'https://loremflickr.com/400/300/cheese,pizza',   'Extra mozzarella, cheddar aur parmesan blend, butter garlic base, cheese lovers ka dream',                               349.00, 299.00, 'pizza'),
('Prawn Pizza',               'https://loremflickr.com/400/300/seafood,pizza',           'Garlic butter base, juicy prawns, cherry tomatoes, spinach aur lemon zest',                                              399.00, 349.00, 'pizza'),
('Veggie Supreme Pizza',      'https://loremflickr.com/400/300/vegetable,pizza',          '7 vegetables ka combination, thin crust, light on cheese aur heavy on freshness',                                        299.00, 249.00, 'pizza'),
('Spicy Volcano Pizza',       'https://loremflickr.com/400/300/spicy,pizza',         'Habanero sauce, spicy chicken, green chilies, red chilli flakes aur tabasco drizzle',                                   359.00, 309.00, 'pizza'),

-- DOSA (8 items)
('Masala Dosa',               'https://loremflickr.com/400/300/dosa,indian',           'Crispy rice crepe, spiced potato filling, coconut chutney aur sambar ke saath, South Indian classic',                   149.00, 119.00, 'dosa'),
('Plain Dosa',                'https://loremflickr.com/400/300/dosa',            'Thin crispy dosa with coconut chutney aur sambar, simple aur healthy breakfast',                                         99.00,  79.00,  'dosa'),
('Set Dosa',                  'https://loremflickr.com/400/300/dosa',              'Soft fluffy 3 small dosas, sambar aur 2 chutneys ke saath, South Indian style',                                          129.00, 99.00,  'dosa'),
('Paneer Dosa',               'https://loremflickr.com/400/300/dosa,indian',           'Dosa stuffed with paneer bhurji masala, capsicum aur coriander, desi fusion',                                            179.00, 149.00, 'dosa'),
('Rava Dosa',                 'https://loremflickr.com/400/300/dosa,crepe',             'Crispy semolina dosa with ginger, green chilli aur coriander, instantly made',                                           149.00, 119.00, 'dosa'),
('Onion Dosa',                'https://loremflickr.com/400/300/dosa',            'Thin dosa with caramelized onion filling, mustard seeds aur curry leaves tadka',                                         129.00, 99.00,  'dosa'),
('Spring Onion Cheese Dosa',  'https://loremflickr.com/400/300/dosa,cheese',           'Fusion dosa with melted cheese, spring onions aur black pepper, best street food',                                       169.00, 139.00, 'dosa'),
('Pesarattu Dosa',            'https://loremflickr.com/400/300/dosa,lentil',             'Green moong dal dosa with ginger chutney, Andhra style healthy breakfast option',                                         139.00, 109.00, 'dosa'),

-- MOMOS (8 items)
('Chicken Steamed Momos',     'https://loremflickr.com/400/300/dumpling,chicken',         'Soft steamed momos, juicy chicken filling, spicy red chutney ke saath, Tibetan style',                                  149.00, 119.00, 'momos'),
('Veg Steamed Momos',         'https://loremflickr.com/400/300/dumpling,vegetable',             'Cabbage, carrot, garlic aur ginger ki stuffing, steamed perfection, healthy aur filling',                                129.00, 99.00,  'momos'),
('Chicken Fried Momos',       'https://loremflickr.com/400/300/dumpling,fried',           'Crispy fried momos, golden outside, juicy inside, sriracha chutney ke saath',                                            169.00, 139.00, 'momos'),
('Tandoori Momos',            'https://loremflickr.com/400/300/dumpling,tandoori',        'Tandoor mein pakaye momos, smoky flavor, tikka masala coating aur mint chutney',                                         189.00, 159.00, 'momos'),
('Paneer Momos',              'https://loremflickr.com/400/300/dumpling,cheese',          'Crumbled paneer aur herbs ki stuffing, steamed momos with garlic chutney',                                               149.00, 119.00, 'momos'),
('Prawn Momos',               'https://loremflickr.com/400/300/dumpling,shrimp',           'Juicy prawns, ginger, garlic aur green onion filling, Chinese-style steamed',                                            179.00, 149.00, 'momos'),
('Chilli Momos',              'https://loremflickr.com/400/300/dumpling,spicy',          'Stir-fried momos in spicy Indo-Chinese sauce, capsicum, onion aur soya sauce',                                           169.00, 139.00, 'momos'),
('Chocolate Momos',           'https://loremflickr.com/400/300/dumpling,chocolate',           'Sweet dessert momos, dark chocolate aur hazelnut filling, strawberry sauce ke saath',                                    159.00, 129.00, 'momos'),

-- NOODLES (8 items)
('Chicken Hakka Noodles',     'https://loremflickr.com/400/300/chicken,noodles',       'Stir-fried noodles, shredded chicken, bell peppers, soya sauce aur sesame oil',                                          179.00, 149.00, 'noodles'),
('Veg Hakka Noodles',         'https://loremflickr.com/400/300/vegetable,noodles',           'Wok-tossed noodles, fresh vegetables, garlic, soya aur chilli sauce',                                                   149.00, 119.00, 'noodles'),
('Schezwan Noodles',          'https://loremflickr.com/400/300/spicy,noodles',      'Fiery schezwan sauce noodles, vegetables, egg aur hot chilli oil',                                                       169.00, 139.00, 'noodles'),
('Singapore Noodles',         'https://loremflickr.com/400/300/noodles,asian',     'Thin rice noodles, curry powder, shrimp, vegetables aur egg, Southeast Asian touch',                                     189.00, 159.00, 'noodles'),
('Egg Noodles',               'https://loremflickr.com/400/300/egg,noodles',           'Egg tossed noodles, spring onions, mushrooms aur oyster sauce',                                                          159.00, 129.00, 'noodles'),
('Chow Mein',                 'https://loremflickr.com/400/300/chowmein,noodles',             'Classic chow mein with cabbage, carrot, bean sprouts aur Indo-Chinese sauce',                                            159.00, 129.00, 'noodles'),
('Pad Thai Noodles',          'https://loremflickr.com/400/300/padthai,noodles',              'Thai style rice noodles, peanuts, bean sprouts, lime aur sweet-spicy tamarind sauce',                                   199.00, 169.00, 'noodles'),
('Butter Garlic Noodles',     'https://loremflickr.com/400/300/noodles,garlic',        'Rich butter sauce, garlic, parsley aur Parmesan, Italian-Indo fusion delight',                                            179.00, 149.00, 'noodles'),

-- CHOLE (6 items)
('Chole Bhature',             'https://loremflickr.com/400/300/cholebhature,indian',         'Spicy black chickpea curry, fluffy deep-fried bhature aur pickled onions, Punjabi classic',                             149.00, 119.00, 'chole'),
('Chole Kulche',              'https://loremflickr.com/400/300/chickpea,curry',          'Soft kulche with tangy white chole, amchur aur chilli garnished, Delhi street special',                                  139.00, 109.00, 'chole'),
('Pindi Chole',               'https://loremflickr.com/400/300/chickpea,curry',           'Dry masaledar chole, no gravy, authentic Rawalpindi style recipe with anardana',                                         129.00, 99.00,  'chole'),
('Amritsari Chole',           'https://loremflickr.com/400/300/chickpea,curry',       'Black tea cooked chole, thick gravy, tamarind aur pomegranate seeds, super flavorful',                                   149.00, 119.00, 'chole'),
('Chole Rice',                'https://loremflickr.com/400/300/chickpea,rice',            'Chole served with steamed rice, onion salad, lemon aur papad, complete meal',                                            139.00, 109.00, 'chole'),
('Chole Tikki',               'https://loremflickr.com/400/300/chickpea,snack',           'Crispy aloo tikki topped with spicy chole, dahi, tamarind chutney aur sev',                                              129.00, 99.00,  'chole'),

-- PANEER (8 items)
('Paneer Tikka',              'https://loremflickr.com/400/300/paneer,tikka',          'Tandoor grilled paneer chunks, bell peppers, onion, chaat masala aur mint chutney',                                      249.00, 209.00, 'panner'),
('Shahi Paneer',              'https://loremflickr.com/400/300/paneer,curry',          'Rich cream aur cashew gravy, paneer cubes, kesar aur kewra water, royal Mughlai dish',                                   279.00, 239.00, 'panner'),
('Palak Paneer',              'https://loremflickr.com/400/300/spinach,curry',          'Silky spinach gravy, soft paneer, garlic tadka aur fresh cream, healthy aur delicious',                                  249.00, 209.00, 'panner'),
('Matar Paneer',              'https://loremflickr.com/400/300/paneer,curry',          'Green peas aur paneer in tomato-onion masala gravy, roti ya rice ke saath best',                                         229.00, 189.00, 'panner'),
('Kadai Paneer',              'https://loremflickr.com/400/300/paneer,curry',          'Wok-cooked paneer, capsicum, tomato, coriander seeds aur garam masala, thick dry gravy',                                 259.00, 219.00, 'panner'),
('Paneer Lababdar',           'https://loremflickr.com/400/300/paneer,curry',       'Creamy onion-tomato gravy, paneer, kasuri methi aur butter, restaurant style dish',                                       269.00, 229.00, 'panner'),
('Paneer Butter Masala',      'https://loremflickr.com/400/300/paneer,curry',         'Velvety butter-tomato gravy, soft paneer, sweet aur mildly spiced, all-time favorite',                                   259.00, 219.00, 'panner'),
('Paneer Do Pyaza',           'https://loremflickr.com/400/300/paneer,onion',       'Double dose of onions, paneer in thick gravy, fried onion garnish, Mughal style recipe',                                 249.00, 209.00, 'panner'),

-- THALI (6 items)
('Rajasthani Thali',          'https://loremflickr.com/400/300/thali,indian',      'Dal baati churma, gatte ki sabji, ker sangri, bajra roti, chaas aur meetha, poora Rajasthan thali mein',                 249.00, 219.00, 'thali'),
('Gujarati Thali',            'https://loremflickr.com/400/300/thali,indian',        'Unlimited rotli, dal, sabji, khichdi, kadhi, chaas, pickle aur meetha. Pure veg satisfaction',                           229.00, 199.00, 'thali'),
('North Indian Thali',        'https://loremflickr.com/400/300/thali,indian',           'Dal makhani, paneer, 2 sabji, 4 roti, rice, papad, salad aur gulab jamun, complete meal',                               219.00, 189.00, 'thali'),
('South Indian Thali',        'https://loremflickr.com/400/300/thali,indian',           'Rice, sambar, rasam, 3 vegetable curries, curd, pickle, papad aur payasam, banana leaf served',                          199.00, 169.00, 'thali'),
('Mini Thali',                'https://loremflickr.com/400/300/thali,indian',            'Dal, 1 sabji, 2 roti, rice aur papad. Budget-friendly aur satisfying option',                                            149.00, 119.00, 'thali'),
('Special Nawabi Thali',      'https://loremflickr.com/400/300/thali,royal',          'Biryani, nihari, naan, seekh kebab, raita, sheermal aur shahi tukda. Royal Awadhi feast',                               399.00, 349.00, 'thali'),

-- ICE CREAM (8 items)
('Vanilla Sundae',            'https://loremflickr.com/400/300/icecream,sundae',        'Classic vanilla ice cream, hot chocolate fudge, roasted almonds aur whipped cream',                                       99.00,  79.00,  'ice'),
('Strawberry Ice Cream',      'https://loremflickr.com/400/300/icecream,strawberry',   'Fresh strawberry ice cream, real fruit chunks, strawberry syrup aur wafer stick',                                         89.00,  69.00,  'ice'),
('Chocolate Brownie Sundae',  'https://loremflickr.com/400/300/icecream,brownie',        'Warm chocolate brownie, vanilla ice cream, hot fudge aur crushed Oreo',                                                  149.00, 119.00, 'ice'),
('Mango Kulfi',               'https://loremflickr.com/400/300/icecream,mango',           'Asli alphonso mango kulfi, creamy aur rich, rabri drizzle ke saath, Indian delight',                                     79.00,  59.00,  'ice'),
('Paan Ice Cream',            'https://loremflickr.com/400/300/icecream',         'Lucknow special paan flavored ice cream, rose petals aur mukhwas chunks',                                                 89.00,  69.00,  'ice'),
('Gulab Jamun Ice Cream',     'https://loremflickr.com/400/300/icecream,dessert',        'Warm gulab jamun aur cold vanilla ice cream, rose syrup aur pistachio garnish',                                          119.00, 89.00,  'ice'),
('Choco Bar',                 'https://loremflickr.com/400/300/icecream,chocolate',             'Thick chocolate coating, vanilla center, almonds aur coconut flakes ke saath',                                            69.00,  49.00,  'ice'),
('Rainbow Waffle Ice Cream',  'https://loremflickr.com/400/300/icecream,waffle',            'Crispy waffle cone, 3 scoops mixed flavors, rainbow sprinkles aur butterscotch sauce',                                   169.00, 139.00, 'ice');

-- ============================================================
-- TABLE 5: fooditems (Admin panel food management)
-- ============================================================
CREATE TABLE IF NOT EXISTS `fooditems` (
    `id`          INT(11) NOT NULL AUTO_INCREMENT,
    `food_name`   VARCHAR(200) NOT NULL,
    `image`       VARCHAR(300) DEFAULT NULL,
    `price`       DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `offer_price` DECIMAL(10,2) DEFAULT 0.00,
    `description` TEXT DEFAULT NULL,
    `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fooditems` (`food_name`, `image`, `price`, `offer_price`, `description`) VALUES
('Samosa (2 pcs)',      'https://loremflickr.com/400/300/samosa',      30.00,  25.00,  'Crispy aloo-filled samosas, green chutney ke saath'),
('Kachori',            'https://loremflickr.com/400/300/indian,snack',      25.00,  20.00,  'Flaky kachori with spiced moong dal filling'),
('Aloo Tikki',         'https://loremflickr.com/400/300/potato,patty',        40.00,  35.00,  'Crispy potato patty, chutney aur sev garnish'),
('Pani Puri (6 pcs)',  'https://loremflickr.com/400/300/indian,snack',    60.00,  50.00,  'Crispy puri, spiced water, chana aur tamarind'),
('Bhel Puri',          'https://loremflickr.com/400/300/indian,snack',         70.00,  60.00,  'Puffed rice, sev, onion, tomato, chutneys'),
('Papdi Chaat',        'https://loremflickr.com/400/300/indian,snack',        80.00,  70.00,  'Papdi, dahi, tamarind, coriander aur chilli'),
('Dahi Vada',          'https://loremflickr.com/400/300/indian,snack',    90.00,  75.00,  'Soft vadas in sweet dahi, tamarind aur chilli'),
('Spring Rolls (4 pcs)','https://loremflickr.com/400/300/springroll', 120.00, 99.00,  'Crispy rolls with vegetable filling, chilli sauce');

-- ============================================================
-- TABLE 6: cart
-- ============================================================
CREATE TABLE IF NOT EXISTS `cart` (
    `id`             INT(11) NOT NULL AUTO_INCREMENT,
    `user_id`        VARCHAR(150) NOT NULL,
    `food_id`        INT(11) NOT NULL,
    `food_name`      VARCHAR(200) NOT NULL,
    `image`          VARCHAR(300) DEFAULT NULL,
    `offer_price`    DECIMAL(10,2) DEFAULT 0.00,
    `quantity`       INT(11) DEFAULT 1,
    `total`          DECIMAL(10,2) DEFAULT 0.00,
    `added_at`       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_user_id` (`user_id`),
    KEY `idx_food_id` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cart` (`user_id`, `food_id`, `food_name`, `image`, `offer_price`, `quantity`, `total`) VALUES
('rahul.sharma@gmail.com',  1,  'Chicken Biryani',       'https://loremflickr.com/400/300/chicken,biryani',   249.00, 2, 498.00),
('rahul.sharma@gmail.com',  11, 'Classic Cheese Burger', 'https://loremflickr.com/400/300/cheese,burger',     159.00, 1, 159.00),
('priya.verma@gmail.com',   21, 'Margherita Pizza',      'https://loremflickr.com/400/300/margherita,pizza',        249.00, 1, 249.00),
('priya.verma@gmail.com',   44, 'Chicken Steamed Momos', 'https://loremflickr.com/400/300/dumpling,chicken',     119.00, 2, 238.00),
('amit.singh@gmail.com',    31, 'Masala Dosa',           'https://loremflickr.com/400/300/dosa,indian',       119.00, 1, 119.00);

-- ============================================================
-- TABLE 7: orders
-- ============================================================
CREATE TABLE IF NOT EXISTS `orders` (
    `id`              INT(11) NOT NULL AUTO_INCREMENT,
    `user_id`         VARCHAR(150) NOT NULL,
    `food_id`         INT(11) DEFAULT NULL,
    `food_name`       VARCHAR(200) NOT NULL,
    `offer_price`     DECIMAL(10,2) DEFAULT 0.00,
    `price`           DECIMAL(10,2) DEFAULT 0.00,
    `quantity`        INT(11) DEFAULT 1,
    `total`           DECIMAL(10,2) DEFAULT 0.00,
    `customer_name`   VARCHAR(200) DEFAULT NULL,
    `mobile`          VARCHAR(20) DEFAULT NULL,
    `address`         TEXT DEFAULT NULL,
    `status`          ENUM('Pending','Confirmed','Preparing','Out for Delivery','Delivered','Cancelled') DEFAULT 'Pending',
    `order_date`      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_user_id`    (`user_id`),
    KEY `idx_status`     (`status`),
    KEY `idx_order_date` (`order_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` (`user_id`, `food_id`, `food_name`, `offer_price`, `price`, `quantity`, `total`, `customer_name`, `mobile`, `address`, `status`, `order_date`) VALUES
('rahul.sharma@gmail.com',   1,  'Chicken Biryani',       249.00, 299.00, 2, 498.00, 'Rahul Sharma',   '9876541001', 'House No. 12, Gomti Nagar, Lucknow',       'Delivered',        '2024-03-01 12:30:00'),
('rahul.sharma@gmail.com',   11, 'Classic Cheese Burger', 159.00, 199.00, 1, 159.00, 'Rahul Sharma',   '9876541001', 'House No. 12, Gomti Nagar, Lucknow',       'Delivered',        '2024-03-05 18:45:00'),
('priya.verma@gmail.com',    21, 'Margherita Pizza',      249.00, 299.00, 1, 249.00, 'Priya Verma',    '9876541002', 'Flat 4B, Indira Nagar, Lucknow',           'Delivered',        '2024-03-02 20:00:00'),
('priya.verma@gmail.com',    44, 'Chicken Steamed Momos', 119.00, 149.00, 3, 357.00, 'Priya Verma',    '9876541002', 'Flat 4B, Indira Nagar, Lucknow',           'Delivered',        '2024-03-08 13:20:00'),
('amit.singh@gmail.com',     31, 'Masala Dosa',           119.00, 149.00, 2, 238.00, 'Amit Singh',     '9876541003', 'Sector 7, Aliganj, Lucknow',               'Delivered',        '2024-03-03 08:30:00'),
('amit.singh@gmail.com',     2,  'Mutton Biryani',        319.00, 379.00, 1, 319.00, 'Amit Singh',     '9876541003', 'Sector 7, Aliganj, Lucknow',               'Delivered',        '2024-03-10 19:00:00'),
('sneha.gupta@gmail.com',    67, 'Shahi Paneer',          239.00, 279.00, 1, 239.00, 'Sneha Gupta',    '9876541004', 'Block C, Rajajipuram, Lucknow',            'Delivered',        '2024-03-04 14:00:00'),
('sneha.gupta@gmail.com',    53, 'Chole Bhature',         119.00, 149.00, 2, 238.00, 'Sneha Gupta',    '9876541004', 'Block C, Rajajipuram, Lucknow',            'Delivered',        '2024-03-12 09:15:00'),
('rohan.joshi@gmail.com',    52, 'Chicken Hakka Noodles', 149.00, 179.00, 2, 298.00, 'Rohan Joshi',    '9876541005', 'Lane 3, Vikas Nagar, Lucknow',             'Delivered',        '2024-03-05 21:00:00'),
('rohan.joshi@gmail.com',    22, 'Chicken Tikka Pizza',   299.00, 349.00, 1, 299.00, 'Rohan Joshi',    '9876541005', 'Lane 3, Vikas Nagar, Lucknow',             'Delivered',        '2024-03-15 20:30:00'),
('ananya.mishra@gmail.com',  3,  'Veg Dum Biryani',       169.00, 199.00, 1, 169.00, 'Ananya Mishra',  '9876541006', 'Plot 9, Hazratganj, Lucknow',              'Delivered',        '2024-03-06 13:00:00'),
('ananya.mishra@gmail.com',  77, 'Vanilla Sundae',         79.00,  99.00, 2, 158.00, 'Ananya Mishra',  '9876541006', 'Plot 9, Hazratganj, Lucknow',              'Delivered',        '2024-03-18 15:45:00'),
('vikram.yadav@gmail.com',   12, 'Chicken Crispy Burger', 149.00, 179.00, 2, 298.00, 'Vikram Yadav',   '9876541007', 'House 23, Aminabad, Lucknow',             'Delivered',        '2024-03-07 12:00:00'),
('vikram.yadav@gmail.com',   45, 'Veg Steamed Momos',      99.00, 129.00, 3, 297.00, 'Vikram Yadav',   '9876541007', 'House 23, Aminabad, Lucknow',             'Delivered',        '2024-03-20 16:00:00'),
('kavya.tiwari@gmail.com',   32, 'Plain Dosa',             79.00,  99.00, 2, 158.00, 'Kavya Tiwari',   '9876541008', 'Room 101, University Road, Lucknow',       'Delivered',        '2024-03-08 07:45:00'),
('kavya.tiwari@gmail.com',   74, 'Rajasthani Thali',      219.00, 249.00, 1, 219.00, 'Kavya Tiwari',   '9876541008', 'Room 101, University Road, Lucknow',       'Delivered',        '2024-03-22 13:30:00'),
('arjun.pandey@gmail.com',   6,  'Prawn Biryani',         299.00, 349.00, 1, 299.00, 'Arjun Pandey',   '9876541009', 'Villa 7, Sahara Ganj, Lucknow',            'Delivered',        '2024-03-09 19:30:00'),
('arjun.pandey@gmail.com',   28, 'Pepperoni Pizza',       329.00, 379.00, 1, 329.00, 'Arjun Pandey',   '9876541009', 'Villa 7, Sahara Ganj, Lucknow',            'Delivered',        '2024-03-25 20:00:00'),
('divya.saxena@gmail.com',   66, 'Paneer Tikka',          209.00, 249.00, 1, 209.00, 'Divya Saxena',   '9876541010', 'Flat 2A, Mall Avenue, Lucknow',            'Delivered',        '2024-03-10 18:00:00'),
('divya.saxena@gmail.com',   54, 'Chole Kulche',          109.00, 139.00, 2, 218.00, 'Divya Saxena',   '9876541010', 'Flat 2A, Mall Avenue, Lucknow',            'Delivered',        '2024-03-28 10:00:00'),
('manish.kumar@gmail.com',   1,  'Chicken Biryani',       249.00, 299.00, 3, 747.00, 'Manish Kumar',   '9876541011', 'House 45, Krishna Nagar, Lucknow',         'Out for Delivery', '2024-04-01 12:00:00'),
('pooja.agarwal@gmail.com',  22, 'Chicken Tikka Pizza',   299.00, 349.00, 2, 598.00, 'Pooja Agarwal',  '9876541012', 'Flat 5C, Gomti Nagar, Lucknow',            'Preparing',        '2024-04-02 19:30:00'),
('saurabh.dubey@gmail.com',  46, 'Chicken Fried Momos',   139.00, 169.00, 4, 556.00, 'Saurabh Dubey',  '9876541013', 'Lane 8, Chowk, Lucknow',                  'Confirmed',        '2024-04-03 14:00:00'),
('ritu.shukla@gmail.com',    75, 'Gujarati Thali',        199.00, 229.00, 2, 398.00, 'Ritu Shukla',    '9876541014', 'Block D, Aliganj, Lucknow',                'Pending',          '2024-04-04 13:00:00'),
('nikhil.trivedi@gmail.com', 13, 'Veg Burger',             99.00, 129.00, 3, 297.00, 'Nikhil Trivedi', '9876541015', 'Room 305, Indira Nagar, Lucknow',          'Pending',          '2024-04-04 16:45:00');

-- ============================================================
-- TABLE 8: favourites
-- ============================================================
CREATE TABLE IF NOT EXISTS `favourites` (
    `id`        INT(11) NOT NULL AUTO_INCREMENT,
    `user_id`   VARCHAR(150) NOT NULL,
    `food_id`   INT(11) NOT NULL,
    `food_name` VARCHAR(200) DEFAULT NULL,
    `image`     VARCHAR(300) DEFAULT NULL,
    `price`     DECIMAL(10,2) DEFAULT 0.00,
    `added_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_fav` (`user_id`, `food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `favourites` (`user_id`, `food_id`, `food_name`, `image`, `price`) VALUES
('rahul.sharma@gmail.com',  1,  'Chicken Biryani',       'https://loremflickr.com/400/300/chicken,biryani',   299.00),
('rahul.sharma@gmail.com',  21, 'Margherita Pizza',      'https://loremflickr.com/400/300/margherita,pizza',        299.00),
('rahul.sharma@gmail.com',  44, 'Chicken Steamed Momos', 'https://loremflickr.com/400/300/dumpling,chicken',     149.00),
('priya.verma@gmail.com',   66, 'Paneer Tikka',          'https://loremflickr.com/400/300/paneer,tikka',      249.00),
('priya.verma@gmail.com',   67, 'Shahi Paneer',          'https://loremflickr.com/400/300/paneer,curry',      279.00),
('priya.verma@gmail.com',   77, 'Vanilla Sundae',        'https://loremflickr.com/400/300/icecream,sundae',     99.00),
('amit.singh@gmail.com',    2,  'Mutton Biryani',        'https://loremflickr.com/400/300/mutton,biryani',    379.00),
('amit.singh@gmail.com',    14, 'BBQ Chicken Burger',    'https://loremflickr.com/400/300/bbq,burger',        219.00),
('sneha.gupta@gmail.com',   31, 'Masala Dosa',           'https://loremflickr.com/400/300/dosa,indian',       149.00),
('sneha.gupta@gmail.com',   53, 'Chole Bhature',         'https://loremflickr.com/400/300/cholebhature,indian',     149.00),
('rohan.joshi@gmail.com',   22, 'Chicken Tikka Pizza',   'https://loremflickr.com/400/300/chicken,pizza',349.00),
('rohan.joshi@gmail.com',   47, 'Tandoori Momos',        'https://loremflickr.com/400/300/dumpling,tandoori',    189.00),
('ananya.mishra@gmail.com', 74, 'Rajasthani Thali',      'https://loremflickr.com/400/300/thali,indian',  249.00),
('vikram.yadav@gmail.com',  6,  'Prawn Biryani',         'https://loremflickr.com/400/300/prawn,biryani',     349.00),
('kavya.tiwari@gmail.com',  82, 'Mango Kulfi',           'https://loremflickr.com/400/300/icecream,mango',        79.00);

-- ============================================================
-- TABLE 9: recycle (Deleted users backup)
-- ============================================================
CREATE TABLE IF NOT EXISTS `recycle` (
    `id`         INT(11) NOT NULL AUTO_INCREMENT,
    `fname`      VARCHAR(100) DEFAULT NULL,
    `lname`      VARCHAR(100) DEFAULT NULL,
    `uname`      VARCHAR(100) DEFAULT NULL,
    `mob`        VARCHAR(15) DEFAULT NULL,
    `email`      VARCHAR(150) DEFAULT NULL,
    `pass`       VARCHAR(255) DEFAULT NULL,
    `deleted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `recycle` (`fname`, `lname`, `uname`, `mob`, `email`, `pass`, `deleted_at`) VALUES
('Deleted',  'User1', 'del_user1', '9000000001', 'deleted1@test.com', 'pass1', '2024-02-01 10:00:00'),
('Removed',  'User2', 'rem_user2', '9000000002', 'removed2@test.com', 'pass2', '2024-02-15 12:00:00');

-- ============================================================
-- TABLE 10: food (general food table)
-- ============================================================
CREATE TABLE IF NOT EXISTS `food` (
    `id`          INT(11) NOT NULL AUTO_INCREMENT,
    `food_name`   VARCHAR(200) NOT NULL,
    `image`       VARCHAR(300) DEFAULT NULL,
    `category`    VARCHAR(100) DEFAULT NULL,
    `price`       DECIMAL(10,2) DEFAULT 0.00,
    `description` TEXT DEFAULT NULL,
    `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `food` (`food_name`, `image`, `category`, `price`, `description`) VALUES
('Garlic Naan',         'https://loremflickr.com/400/300/naan,bread',         'bread',   40.00,  'Soft tandoori naan with garlic butter'),
('Butter Roti',         'https://loremflickr.com/400/300/flatbread',          'bread',   20.00,  'Soft whole wheat roti with butter'),
('Jeera Rice',          'https://loremflickr.com/400/300/rice',    'rice',    99.00,  'Aromatic cumin rice, ghee aur coriander'),
('Raita',               'https://loremflickr.com/400/300/yogurt',         'side',    49.00,  'Chilled dahi with cucumber aur mint'),
('Papad',               'https://loremflickr.com/400/300/cracker',         'side',    29.00,  'Crispy roasted papad, 2 pieces'),
('Lassi (Sweet)',        'https://loremflickr.com/400/300/lassi,drink',         'drinks',  79.00,  'Thick sweet lassi, cream topped'),
('Lassi (Salty)',        'https://loremflickr.com/400/300/lassi,drink',    'drinks',  69.00,  'Refreshing namkeen lassi'),
('Mango Shake',          'https://loremflickr.com/400/300/mango,milkshake',  'drinks',  99.00,  'Thick mango milkshake, real Alfonso'),
('Cold Coffee',          'https://loremflickr.com/400/300/coffee,icecream',  'drinks',  89.00,  'Blended cold coffee with ice cream'),
('Fresh Lime Soda',      'https://loremflickr.com/400/300/lemonade',    'drinks',  59.00,  'Sweet or salty lime soda, refreshing'),
('Gulab Jamun (2 pcs)',  'https://loremflickr.com/400/300/indian,dessert',  'sweet',   79.00,  'Soft khoya balls in rose sugar syrup'),
('Kheer',               'https://loremflickr.com/400/300/ricepudding',         'sweet',   89.00,  'Creamy rice kheer with kesar aur pista');

-- ============================================================
-- ✅ DATABASE IMPORT COMPLETE!
-- Total Data:
--   signup      -> 20 users
--   admin       -> 3 admins
--   restaurants -> 15 restaurants
--   biryanis    -> 82 food items (10 categories)
--   fooditems   -> 8 snack items
--   cart        -> 5 active cart items
--   orders      -> 25 orders (delivered + active)
--   favourites  -> 15 favourite items
--   food        -> 12 side dishes & drinks
-- ============================================================
