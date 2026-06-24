-- ============================================================
--  FOODIE - Food Delivery App | Complete Database
--  Database: fooddb
--  Author: Optimized Version
--  Date: 2024
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

-- ============================================================
-- TABLE 2: admin
-- ============================================================
CREATE TABLE IF NOT EXISTS `admin` (
    `id`       INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default admin account (username: admin, password: admin123)
INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

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

-- Sample restaurant data
INSERT INTO `restaurants` (`name`, `rating`, `image`, `description`, `about`, `location`, `timing`, `contact`, `type`) VALUES
('Spice Garden', 4.5, 'uploads/restaurant1.jpg', 'Authentic Indian Cuisine', 'Best biryani in town', 'Lucknow, UP', '10 AM - 11 PM', '9876543210', 'Veg, Non-Veg'),
('Burger Hub', 4.2, 'uploads/restaurant2.jpg', 'Fresh & Crispy Burgers', 'Made with fresh ingredients daily', 'Lucknow, UP', '11 AM - 12 AM', '9876500001', 'Non-Veg'),
('Pizza Palace', 4.3, 'uploads/restaurant3.jpg', 'Thin Crust Pizzas', 'Wood-fired authentic pizzas', 'Lucknow, UP', '12 PM - 11 PM', '9876500002', 'Veg, Non-Veg');

-- ============================================================
-- TABLE 4: biryanis (All food items - used for all categories)
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

-- Sample food items
INSERT INTO `biryanis` (`food_name`, `image`, `description`, `price`, `offer_price`, `category`) VALUES
('Chicken Biryani',   'uploads/chicken_biryani.jpg',  'Aromatic Hyderabadi style biryani',     299.00, 249.00, 'biryani'),
('Veg Biryani',       'uploads/veg_biryani.jpg',      'Fragrant basmati with fresh veggies',   199.00, 169.00, 'biryani'),
('Mutton Biryani',    'uploads/mutton_biryani.jpg',   'Tender mutton slow-cooked biryani',     349.00, 299.00, 'biryani'),
('Cheese Burger',     'uploads/cheese_burger.jpg',    'Crispy patty with cheese & lettuce',    199.00, 159.00, 'burger'),
('Chicken Burger',    'uploads/chicken_burger.jpg',   'Juicy grilled chicken burger',          179.00, 149.00, 'burger'),
('Veg Burger',        'uploads/veg_burger.jpg',       'Healthy & fresh veggie burger',         149.00, 119.00, 'burger'),
('Margherita Pizza',  'uploads/margherita.jpg',       'Classic tomato & mozzarella pizza',     299.00, 249.00, 'pizza'),
('Chicken Pizza',     'uploads/chicken_pizza.jpg',    'Loaded with grilled chicken & peppers', 349.00, 299.00, 'pizza'),
('Masala Dosa',       'uploads/masala_dosa.jpg',      'Crispy dosa with spiced potato filling',149.00, 129.00, 'dosa'),
('Chicken Momos',     'uploads/chicken_momos.jpg',    'Steamed momos with spicy chutney',      149.00, 119.00, 'momos'),
('Hakka Noodles',     'uploads/noodles.jpg',          'Stir-fried noodles with veggies',       179.00, 149.00, 'noodles'),
('Chole Bhature',     'uploads/chole.jpg',            'Fluffy bhature with spicy chole',       149.00, 129.00, 'chole'),
('Paneer Tikka',      'uploads/paneer.jpg',           'Grilled cottage cheese with spices',    249.00, 219.00, 'panner'),
('Dal Thali',         'uploads/thali.jpg',            'Complete thali with dal, sabji, roti',  199.00, 179.00, 'thali'),
('Ice Cream Sundae',  'uploads/ice_cream.jpg',        'Vanilla sundae with chocolate sauce',   99.00,  79.00,  'ice');

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
    KEY `idx_user_id` (`user_id`),
    KEY `idx_status`  (`status`),
    KEY `idx_order_date` (`order_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- ============================================================
-- TABLE 10: food (general food table if referenced)
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

-- ============================================================
-- DONE! All tables created successfully.
-- ============================================================
