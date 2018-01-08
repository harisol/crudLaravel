Query One to One -> method hasOne()
select * from `profile` where `profile`.`user_id` = 1 and `profile`.`user_id` is not null limit 1

Query One to Many -> method hasMany()
select * from `kendaraan` where `kendaraan`.`user_id` = 1 and `kendaraan`.`user_id` is not null

Query many to one / one to one -> method belongsTo()
select * from `users` where `user`.`id` = kendaraan.user_id`

Query many to many -> method belongsToMany()
select `roles`.*, `roles_users`.`user_id` as `pivot_user_id`, `roles_users`.`role_id` as `pivot_role_id` from `roles` inner join `roles_users` on `roles`.`id` = `roles_users`.`role_id` where `roles_users`.`user_id` = 1

Query many to many -> method hasManyThrough()
select `kendaraan`.*, `users`.`kota_id` from `kendaraan` inner join `users` on `users`.`id` = `kendaraan`.`user_id` where `users`.`kota_id` = 1

