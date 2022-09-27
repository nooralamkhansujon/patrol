<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CheckPoint
 *
 * @property int $id
 * @property string $name
 * @property string $code_number
 * @property int $organization_id
 * @property string $description
 * @property string $creation_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Organization $organization
 * @method static \Database\Factories\CheckPointFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint query()
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereCodeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereCreationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckPoint whereUpdatedAt($value)
 */
	class CheckPoint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CheckpointLog
 *
 * @property int $id
 * @property int $checkpoint_id
 * @property int $device_id
 * @property int|null $patrolman_id
 * @property int $create_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CheckPoint $checkPoint
 * @property-read \App\Models\Device $device
 * @property-read \App\Models\PatrolMan|null $patrolman
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog whereCheckpointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog wherePatrolmanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CheckpointLog whereUpdatedAt($value)
 */
	class CheckpointLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Device
 *
 * @property int $id
 * @property string $name
 * @property string $device_number
 * @property string $mode
 * @property int $organization_id
 * @property \App\Models\PatrolMan $owner
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DeviceActivity[] $deviceActivities
 * @property-read int|null $device_activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DeviceRoute[] $deviceLines
 * @property-read int|null $device_lines_count
 * @property-read \App\Models\DeviceSetting|null $deviceSetting
 * @property-read \App\Models\Organization $organization
 * @method static \Illuminate\Database\Eloquent\Builder|Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device query()
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereDeviceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereUpdatedAt($value)
 */
	class Device extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeviceActivity
 *
 * @property int $id
 * @property string $last_scan_time
 * @property string|null $electricity
 * @property int $device_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Device $device
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity whereElectricity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity whereLastScanTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceActivity whereUpdatedAt($value)
 */
	class DeviceActivity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeviceRoute
 *
 * @property int $id
 * @property int $device_id
 * @property int $route_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Device $device
 * @property-read \App\Models\Route $route
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRoute whereUpdatedAt($value)
 */
	class DeviceRoute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeviceSetting
 *
 * @property int $id
 * @property int $device_id
 * @property string $sound
 * @property string|null $clock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Device $device
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting whereClock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting whereSound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceSetting whereUpdatedAt($value)
 */
	class DeviceSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Organization
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Organization[] $childrens
 * @property-read int|null $childrens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Route[] $routes
 * @property-read int|null $routes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereUpdatedAt($value)
 */
	class Organization extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PatrolMan
 *
 * @property int $id
 * @property string $name
 * @property string $code_number
 * @property int $organization_id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Organization $organization
 * @method static \Database\Factories\PatrolManFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan whereCodeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolMan whereUpdatedAt($value)
 */
	class PatrolMan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PatrolTask
 *
 * @property int $id
 * @property string $name
 * @property int $route_id
 * @property string $weeks
 * @property string $start_date
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PlanTime[] $planTimes
 * @property-read int|null $plan_times_count
 * @property-read \App\Models\Route $route
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatrolTask whereWeeks($value)
 */
	class PatrolTask extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $code
 * @property int|null $parent_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Permission|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PermissionType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionType query()
 */
	class PermissionType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlanTime
 *
 * @property int $id
 * @property int $task_id
 * @property string $start_time
 * @property string $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PatrolTask $patrolTask
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlanTime whereUpdatedAt($value)
 */
	class PlanTime extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RoleHasPermission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RoleHasPermission
 *
 * @property int $id
 * @property string $code
 * @property string $parentCode
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereParentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereUpdatedAt($value)
 */
	class RoleHasPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Route
 *
 * @property int $id
 * @property string $name
 * @property int $organization_id
 * @property string $description
 * @property string $creation_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RouteCheckpoint[] $CheckPoints
 * @property-read int|null $check_points_count
 * @property-read \App\Models\Organization $organization
 * @method static \Illuminate\Database\Eloquent\Builder|Route newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Route newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Route query()
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereCreationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereUpdatedAt($value)
 */
	class Route extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RouteCheckpoint
 *
 * @property int $id
 * @property int $checkpoint_id
 * @property int $route_id
 * @property string $interval
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CheckPoint $checkpoint
 * @property-read \App\Models\Route $route
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint query()
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint whereCheckpointId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RouteCheckpoint whereUpdatedAt($value)
 */
	class RouteCheckpoint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $organization_id
 * @property int|null $role_id
 * @property string $type
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $loginIp
 * @property string|null $loginTime
 * @property string|null $mobile
 * @property int $online
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Organization $organization
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

