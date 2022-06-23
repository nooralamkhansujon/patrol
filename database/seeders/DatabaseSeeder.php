<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Organization::create([
        //     'name'=>'Binary Brains It',
        //     'description'=>'This is binary brains it',
        //     'parent_id' => 0
        // ]);
        // \App\Models\User::factory(50)->create();
        // \App\Models\PatrolMan::factory(50)->create();
        \App\Models\CheckPoint::factory(40)->create();

        // Permission::insert([
        //     [
        //       'name'=>'Organization Management',
        //       'code' =>'organization:root',
        //       'parent_id'=>null,
        //     //   'orderNum'=>1,
        //     ],
        //     [
        //        'name'=>'Role Management',
        //        'code' =>'role:mng',
        //        'parent_id'=>1
        //     ],
        //     [
        //        'name'=>'Add Role',
        //        'code' =>'add_role:mng',
        //        'parent_id'=>2
        //     ],
        //     [
        //        'name'=>'Modify Role',
        //        'code' =>'modify_role:mng',
        //        'parent_id'=>2
        //     ],
        //     [
        //        'name'=>'Delete Role',
        //        'code' =>'delete_role:mng',
        //        'parent_id'=>2
        //     ],
        //     //end role managements
        //     [
        //         'name'=>'Department Management',
        //         'code' =>'department:mng',
        //         'parent_id'=>1
        //      ],
        //     [
        //         'name'=>'Add Department',
        //         'code' =>'add_department:mng',
        //         'parent_id'=>7
        //      ],
        //     [
        //         'name'=>'Modify Department',
        //         'code' =>'modify_department:mng',
        //         'parent_id'=>7
        //      ],
        //     [
        //         'name'=>'Delete Manager',
        //         'code' =>'delete_department:mng',
        //         'parent_id'=>7
        //      ],
        //      //end of department
        //      [
        //         'name'=>'Account',
        //         'code' =>'account:mng',
        //         'parent_id'=>1
        //      ],
        //      [
        //         'name'=>'Add Account',
        //         'code' =>'add_account:mng',
        //         'parent_id'=>10
        //      ],
        //      [
        //         'name'=>'Modify Account',
        //         'code' =>'modify_account:mng',
        //         'parent_id'=>10
        //      ],
        //      [
        //         'name'=>'Delete Account',
        //         'code' =>'delete_account:mng',
        //         'parent_id'=>10
        //      ],
        //      [
        //         'name'=>'Reset Password',
        //         'code' =>'reset_password_department:mng',
        //         'parent_id'=>10
        //      ],
        //      [
        //         'name'=>'Patrolman',
        //         'code' =>'patrolman:mng',
        //         'parent_id'=>1
        //      ],
        //      [
        //         'name'=>'Add Patrolman',
        //         'code' =>'add_patrolman:mng',
        //         'parent_id'=>15
        //      ],
        //      [
        //         'name'=>'Modify Patrolman',
        //         'code' =>'modify_patrolman:mng',
        //         'parent_id'=>15
        //      ],
        //      [
        //         'name'=>'Delete Patrolman',
        //         'code' =>'delete_patrolman:mng',
        //         'parent_id'=>15
        //      ],
        //      //patrol management
        //      [
        //         'name'=>'Patrol Management',
        //         'code' =>'patrol:root',
        //         'parent_id'=>null
        //      ],
        //      [
        //         'name'=>'Checkpoint',
        //         'code' =>'checkpoint:mng',
        //         'parent_id'=>19
        //      ],
        //      [
        //         'name'=>'Add Checkpoint',
        //         'code' =>'add_checkpoint:mng',
        //         'parent_id'=>20
        //      ],
        //      [
        //         'name'=>'Modify Checkpoint',
        //         'code' =>'modify_checkpoint:mng',
        //         'parent_id'=>20
        //      ],
        //      [
        //         'name'=>'Delete Checkpoint',
        //         'code' =>'delete_checkpoint:mng',
        //         'parent_id'=>20
        //      ],
        //      [
        //         'name'=>'Route Management',
        //         'code' =>'route:root',
        //         'parent_id'=>19
        //      ],
        //      [
        //         'name'=>'Add Route',
        //         'code' =>'add_route:mng',
        //         'parent_id'=>24
        //      ],
        //      [
        //         'name'=>'Modify Route',
        //         'code' =>'modify_route:mng',
        //         'parent_id'=>24
        //      ],
        //      [
        //         'name'=>'Delete Route',
        //         'code' =>'delete_route:mng',
        //         'parent_id'=>24
        //      ],
        //      [
        //         'name'=>'Checkpoint ',
        //         'code' =>'route_checkpoint:mng',
        //         'parent_id'=>24
        //      ],
        //      [
        //         'name'=>'Add Checkpoint',
        //         'code' =>'add_route_checkpoint:mng',
        //         'parent_id'=>28
        //      ],
        //      [
        //         'name'=>'Delete Checkpoint',
        //         'code' =>'delete_route_checkpoint:mng',
        //         'parent_id'=>28
        //      ],
        //      [
        //         'name'=>'Order Checkpoint',
        //         'code' =>'order_route_checkpoint:mng',
        //         'parent_id'=>28
        //      ],
        //      [
        //         'name'=>'Patrol Task',
        //         'code' =>'patrol_task:mng',
        //         'parent_id'=>24
        //      ],
        //      [
        //         'name'=>'Add Task',
        //         'code' =>'add_patrol_task:mng',
        //         'parent_id'=>32
        //      ],
        //      [
        //         'name'=>'Modify Task',
        //         'code' =>'modify_patrol_task:mng',
        //         'parent_id'=>32
        //      ],
        //      [
        //         'name'=>'Delete Task',
        //         'code' =>'delete_patrol_task:mng',
        //         'parent_id'=>32
        //      ],
        //      [
        //         'name'=>'Reader Management',
        //         'code' =>'reader_management:mng',
        //         'parent_id'=>24
        //      ],
        //      [
        //         'name'=>'Modify Reader',
        //         'code' =>'modify_reader_management:mng',
        //         'parent_id'=>36
        //      ],
        //      [
        //         'name'=>'Clock Group',
        //         'code' =>'clock_group:mng',
        //         'parent_id'=>24
        //      ],
        //      [
        //         'name'=>'Add ClockGroup',
        //         'code' =>'add_clockgroup:mng',
        //         'parent_id'=>38
        //      ],
        //      [
        //         'name'=>'Modify ClockGroup',
        //         'code' =>'modify_clockgroup:mng',
        //         'parent_id'=>38
        //      ],
        //      [
        //         'name'=>'Delete ClockGroup',
        //         'code' =>'delete_clockgroup:mng',
        //         'parent_id'=>38
        //      ],
        //      [
        //         'name'=>'Add Clock',
        //         'code' =>'add_clock_clockgroup:mng',
        //         'parent_id'=>38
        //      ],
        //      [
        //         'name'=>'Delete Clock',
        //         'code' =>'delete_clock_clockgroup:mng',
        //         'parent_id'=>38
        //      ],
        //      [
        //         'name'=>'View Records',
        //         'code' =>'view_records:root',
        //         'parent_id'=>null
        //      ],
        //      [
        //         'name'=>'Attendance',
        //         'code' =>'attendance_view_records:mng',
        //         'parent_id'=>44
        //      ],
        //      [
        //         'name'=>'Task(Task Details)',
        //         'code' =>'task_details_view_records:mng',
        //         'parent_id'=>44
        //      ],
        //      [
        //         'name'=>'Assessment',
        //         'code' =>'assessment_view_records:mng',
        //         'parent_id'=>44
        //      ],
        //      [
        //         'name'=>'Emergency Alarm',
        //         'code' =>'emergency_alarm_view_records:mng',
        //         'parent_id'=>44
        //      ],
        //      [
        //         'name'=>'Device Trail',
        //         'code' =>'device_trail_view_records:mng',
        //         'parent_id'=>44
        //      ],
        //      [
        //         'name'=>'Real-Time Monitoring',
        //         'code' =>'real_time_monitoring_view_records:mng',
        //         'parent_id'=>44
        //      ],
        //      [
        //         'name'=>'System Management',
        //         'code' =>'sys:mng',
        //         'parent_id'=>null
        //      ],
        //      [
        //         'name'=>'Operation Log',
        //         'code' =>'operation_log_sys:mng',
        //         'parent_id'=>51
        //      ],
        //      [
        //         'name'=>'Email Manager',
        //         'code' =>'email_mng_sys:mng',
        //         'parent_id'=>51
        //      ],
        //      [
        //         'name'=>'Add Email',
        //         'code' =>'add_email_mng_sys:mng',
        //         'parent_id'=>52
        //      ],
        //      [
        //         'name'=>'Delete Email',
        //         'code' =>'delete_email_mng_sys:mng',
        //         'parent_id'=>52
        //      ],



        // ]);
    }
}
