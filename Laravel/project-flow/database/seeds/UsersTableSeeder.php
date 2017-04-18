<?php


use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Super user Role
        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Super User',
            'slug' => 'super-user',
            'permissions' => [
                'admin'   => true,
            ]
        ]);

        // create Project Leader Role
        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Project Leader',
            'slug' => 'project-leader',
            'permissions' => [
                'project-leader'   => true,
            ]
        ]);

        // create Designer Role
        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Designer',
            'slug' => 'designer',
            'permissions' => [
                'designer'   => true,
            ]
        ]);

        // create Super User
        $credentials_super = [
            'email'    => 'sajjad@codetrio.com',
            'password' => 'ct123456',
        ];

        //assign super user to role
        $super_user = Sentinel::registerAndActivate($credentials_super);
        $role = Sentinel::findRoleBySlug('super-user');
        $role->users()->attach($super_user);
    }
}
