

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator',  '2021-11-24 17:06:43', '2021-12-12 02:29:52');


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', '1', '', NULL, '2021-11-24 17:06:43', '2021-12-12 02:29:52');



