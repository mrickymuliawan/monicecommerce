-- monic_commerce.`order` definition

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `voucher_id` int DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- monic_commerce.order_item definition

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- monic_commerce.product definition

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `image_url_2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- monic_commerce.`user` definition

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- monic_commerce.carts definition

CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- monic_commerce.categories definition

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- monic_commerce.vouchers definition

CREATE TABLE `vouchers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `quotas` int DEFAULT NULL,
  `percent` int DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;