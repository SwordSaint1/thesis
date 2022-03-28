php artisan make:migration create_students_table --create=students
php artisan make:controller StudentController --resource --model=Student

php artisan make:migration create_courses_table --create=courses
php artisan make:controller CourseController --resource --model=Course


php artisan make:migration create_subjects_table --create=subjects
php artisan make:controller SubjectController --resource --model=Subject

php artisan make:migration create_enrollment_forms_table --create=enrollment_forms
php artisan make:controller EnrollmentFormController --resource --model=EnrollmentForm

php artisan make:migration create_enrollment_details_table --create=enrollment_details
php artisan make:controller EnrollmentDetailController --resource --model=EnrollmentDetail

php artisan make:migration create_payments_table --create=payments
php artisan make:controller PaymentController --resource --model=Payment

php artisan make:migration create_payment_types_table --create=payment_types
php artisan make:controller PaymentTypeController --resource --model=PaymentType


php artisan make:migration create_parameters_table --create=parameters
php artisan make:controller ParameterController --resource --model=Parameter

