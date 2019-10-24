<?php

return [
    'userManagement' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateurs',
    ],
    'permission'     => [
        'title'          => 'Autorisations',
        'title_singular' => 'Droits',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'name'                      => 'Sir Name',
            'name_helper'               => 'Family Name',
            'email'                     => 'Email',
            'email_helper'              => '',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => '',
            'password'                  => 'Password',
            'password_helper'           => '',
            'roles'                     => 'Roles',
            'roles_helper'              => '',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => '',
            'other_names'               => 'Other Names',
            'other_names_helper'        => 'e.g Rolly Powells',
            'phone'                     => 'Phone',
            'phone_helper'              => 'Mobile number. e.g +254 700 000 XXX',
            'profile_photo'             => 'Profile Photo',
            'profile_photo_helper'      => '',
            'verified'                  => 'Verified',
            'verified_helper'           => '',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => '',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => '',
            'salutation'                => 'Salutation',
            'salutation_helper'         => '',
        ],
    ],
    'hospital'       => [
        'title'          => 'Hospitals',
        'title_singular' => 'Hospital',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => '',
            'name'                             => 'Hospital Name',
            'name_helper'                      => '',
            'address'                          => 'Address',
            'address_helper'                   => 'Physical address',
            'phone'                            => 'Phone',
            'phone_helper'                     => 'Hospital Contact Phone number',
            'services_and_departments'         => 'Services And Departments',
            'services_and_departments_helper'  => 'services and departments offered in the hospital',
            'created_at'                       => 'Created at',
            'created_at_helper'                => '',
            'updated_at'                       => 'Updated at',
            'updated_at_helper'                => '',
            'deleted_at'                       => 'Deleted at',
            'deleted_at_helper'                => '',
            'level_or_rank_of_facility'        => 'Level Or Rank Of Facility',
            'level_or_rank_of_facility_helper' => 'Level Or Rank Of Facility. e.g. Level 4,5',
            'email'                            => 'Email',
            'email_helper'                     => 'Hospital Contact Email address',
            'photo'                            => 'Photo',
            'photo_helper'                     => '',
        ],
    ],
    'branch'         => [
        'title'          => 'Branches',
        'title_singular' => 'Branch',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => '',
            'name'                             => 'Branch Name',
            'name_helper'                      => '',
            'address'                          => 'Address',
            'address_helper'                   => 'Physical address',
            'phone'                            => 'Phone',
            'phone_helper'                     => 'Hospital Contact Phone number',
            'services_and_departments'         => 'Services And Departments',
            'services_and_departments_helper'  => 'services and departments offered in the hospital',
            'level_or_rank_of_facility'        => 'Level Or Rank Of Facility',
            'level_or_rank_of_facility_helper' => 'Level Or Rank Of Facility. e.g. Level 4, 5',
            'main_hospital'                    => 'Main Hospital',
            'main_hospital_helper'             => 'Belongs to which hospital',
            'created_at'                       => 'Created at',
            'created_at_helper'                => '',
            'updated_at'                       => 'Updated at',
            'updated_at_helper'                => '',
            'deleted_at'                       => 'Deleted at',
            'deleted_at_helper'                => '',
        ],
    ],
    'service'        => [
        'title'          => 'Services',
        'title_singular' => 'Service',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => '',
            'name_of_the_service'        => 'Name',
            'name_of_the_service_helper' => 'Name Of The Service',
            'created_at'                 => 'Created at',
            'created_at_helper'          => '',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => '',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => '',
            'photo'                      => 'Representative Photo',
            'photo_helper'               => 'an image representing the service.',
        ],
    ],
    'doctor'         => [
        'title'          => 'Doctors',
        'title_singular' => 'Doctor',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'specialty'                => 'Specialty',
            'specialty_helper'         => 'E.g. Dentist, Cardiologist',
            'services_offering'        => 'Services Offering',
            'services_offering_helper' => 'What services the doctor provides',
            'hospital'                 => 'Hospital',
            'hospital_helper'          => 'Works with which hospital?',
            'user_profile'             => 'User Profile',
            'user_profile_helper'      => '',
            'is_available'             => 'Is Available',
            'is_available_helper'      => 'Is the doctor available?',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'branch'                   => 'Branches',
            'branch_helper'            => 'Which branch of the hospital?',
        ],
    ],
    'appointment'    => [
        'title'          => 'Appointments',
        'title_singular' => 'Appointment',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'hospital'              => 'Hospital',
            'hospital_helper'       => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
            'department'            => 'Department',
            'department_helper'     => '',
            'doctor'                => 'Doctor',
            'doctor_helper'         => '',
            'client'                => 'Client',
            'client_helper'         => '',
            'scheduled_time'        => 'Scheduled Time',
            'scheduled_time_helper' => 'booked date/time',
            'rescheduled_to'        => 'Rescheduled To',
            'rescheduled_to_helper' => 'Reschedule to another date/time',
            'status'                => 'Status',
            'status_helper'         => '',
        ],
    ],
    'profile'        => [
        'title'          => 'My Profile',
        'title_singular' => 'My Profile',
    ],
    'healthcare'     => [
        'title'          => 'Facilities',
        'title_singular' => 'Facility',
    ],
];
