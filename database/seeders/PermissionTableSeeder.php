<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permissions
        DB::table('permissions')->delete();
        $permissions = [
            'الباقات الأتوماتيك',
            'تعديل الباقة الأتوماتيك',
            'حذف الباقة الأتوماتيك',
            'اضافة باقة أتوماتيك',
            'الباقات الطبيعية',
            'حذف الباقة الطبيعية',
            'تعديل الباقة الطبيعية',
            'اضافة باقة طبيعية',

            'الإعلانات',
            'تعديل الاعلان',
            'حذف الاعلان',
            'اضافة اعلان',
            'المستخدمين',
            'تعديل مستخدم',
            'حذف مستخدم',
            'اضافة مستخدم',
            'الصلاحيات',
            'تعديل الصلاحيات',
            'حذف الصلاحيات',
             'اضافة صلاحية',
            'الموظفين',
            'تعديل موظف',
            'حذف موظف',
            'اضافة موظق',
            'الاعدادات',
            'تعديل الاعدادات',
            'الصور',
            'حذف الصور',
            'ضريبة التحويل',
           'تعديل ضريبة التحويل',
           'التقارير'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin']);

        }
    }
}
