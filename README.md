# LBX Test API Project

This project is an example of the test API requested by LBX. In this document, you will find information on how to install the project, how to use the API, and technical details about the project.

## Requirements

- PHP 8.1+
- MySQL 5.7+

## Installation

1. Clone this project to your local machine:
```
git clone https://github.com/yourusername/lbx-test-api.git
```

2. Navigate to the project directory:
```
cd lbx-test-api
```

3. Install dependencies:
```
composer install
```

4. Copy the `.env.example` file to `.env` and configure your database settings.


5. Generate an application key:
```
php artisan key:generate
```

6. Run database migrations:
```
php artisan migrate
```

7. Run database seeder:
```
php artisan db:seed
```

8. Start project:
```
php artisan serve
```

## API Usage

You can use the following endpoints of this project's API:

- `POST /api/login`: You can login and get token for api requests.
- `POST /api/employee`: Upload a CSV file to store employee data.
- `POST /api/employee/{id}`: Update a specific employee with parameters.
- `GET /api/employee`: List all employees.
- `GET /api/employee/{id}`: Retrieve details of a specific employee.
- `DELETE /api/employee/{id}`: Delete a selected employee.

## How can I upload a csv file and test the API?

After connecting the database and setting up the project, you can test the API using a tool like Postman. To upload a CSV file and interact with the API, you can follow these steps:

### Demo User
- Email: demo@demo.com
- Pass: 123qweasd


- `First send post request to /api/login with email and password params.`


- `You will receive a token after succesfull login. Save anywhere that token.`


1. `Open Postman or a similar API testing tool.`


2. `Ensure that Laravel project is up and running.`


3. `Use the appropriate API endpoint for uploading a CSV file. In this case, it would be POST /api/employee.`


4. `Set the request method to POST and the endpoint URL to project's URL followed by /api/employee.`


5. `In the Postman application, enter the Authorization field and select Bearer Token. Then enter the token you saved in the field opened on the right.`


6. `In the request body, select the form-data option. Create a key-value pair where the key is csv_file and the value is the CSV file you want to upload. Make sure the file type is set to "File."`


7. `Send the request to the server.`


8. `You will receive a response from the API, which may include information about whether the CSV file was successfully processed and any additional details.`


9. `You can use the other API endpoints (GET /api/employee, GET /api/employee/{id}, POST /api/employee/{id}, DELETE /api/employee/{id}) to interact with employee data as well.`

## Database Columns

This project's database includes the following columns:

- `id`: Unique identifier.
- `employee_id`: Employee ID.
- `user_name`: Employee User Name.
- `name_prefix`: Employee Name Prefix.
- `first_name`: Employee First Name.
- `middle_initial`: Employee Middle Initial.
- `last_name`: Employee Last Name.
- `gender`: Employee Gender.
- `date_of_birth`: Employee Date of Birth.
- `time_of_birth`: Employee Time of Birth.
- `age_in_years`: Employee Age.
- `date_of_joining`: Employee Date of Joining.
- `age_in_company_years`: Employee Age in Company (Years).
- `phone_number`: Employee Phone Number.
- `place_name`: Employee Place Name.
- `country`: Employee Country.
- `city`: Employee City.
- `zip`: Employee Zip Code.
- `region`: Employee Region.
- `email`: Employee Email Address.
- `created_at`: Timestamp of creation.
- `updated_at`: Timestamp of last update.

## Tech Stack

- Laravel 9.52.15
- PHP 8.1
- MySQL
- Apache
- Node

## Plugins

- Laravel Breeze
- Laravel Sanctum

## Security
### Validation
This project employs robust input validation using Laravel's built-in validation mechanisms. Various validation rules are applied to ensure that incoming data adheres to specific criteria, preventing potential security vulnerabilities and ensuring data integrity.

### Laravel Sanctum
Laravel Sanctum is utilized for API authentication. It provides a simple and secure way to authenticate users and issue API tokens for secure API access. Sanctum helps protect against unauthorized access to API endpoints and ensures that only authenticated users can perform sensitive actions.

### Laravel Breeze
Laravel Breeze is employed for user authentication and registration. It offers a minimalistic and secure authentication system with features like user registration, login, and password reset functionality. Breeze is built on top of Laravel's authentication scaffolding, providing a secure foundation for user management.

These security measures, along with Laravel's security best practices, help safeguard the application from common web security threats and ensure that user data is handled securely. It's essential to keep your dependencies up to date to benefit from security patches and enhancements.


## Performance
This API project places a strong emphasis on adhering to coding best practices, optimizing code structure, and following the SOLID principles. While specific performance enhancements or optimizations haven't been implemented, the project's clean and efficient codebase ensures that it runs smoothly and maintains good performance.

The use of SOLID principles encourages maintainability and extensibility, making it easier to introduce performance improvements or optimizations in the future if necessary. Additionally, Laravel's built-in features and optimizations contribute to the overall efficiency of the application.

While there are no specific performance enhancements to highlight, the project's foundation is well-structured, setting the stage for potential future optimizations as the application evolves.




## Thoughts
While this API project currently fulfills its intended purpose efficiently, there are several areas where it can be further enhanced and expanded in the future:

1. Full JSON Representation of Employee Data
   One potential improvement is to provide a full JSON representation of employee data. While the project currently uses separate columns for each attribute, converting the data into a JSON format can make it more versatile and easier to work with, especially if additional fields or nested data structures are introduced.


2. Pagination
   As the dataset of employees grows, consider implementing pagination to limit the number of records returned in a single API request. This not only enhances performance by reducing response size but also provides a more user-friendly experience when dealing with large datasets.


3. API Versioning
   To ensure backward compatibility and facilitate future updates, consider implementing API versioning. This allows you to make changes or enhancements to the API without disrupting existing clients who rely on the previous version.


4. Rate Limiting
   Implement rate limiting to prevent abuse of the API and protect server resources. Rate limiting ensures fair usage and maintains a responsive API for all users.


5. Authentication and Authorization
   Enhance security by implementing a robust authentication and authorization system. Depending on the requirements, you can explore options like OAuth2 for third-party access or fine-grained access control based on user roles and permissions.


6. Unit Testing and Continuous Integration
   Invest in unit testing to ensure the reliability and stability of the application. Setting up a continuous integration (CI) pipeline can automate the testing process, making it easier to catch and address issues early in the development cycle.


7. Monitoring and Logging
   Implement monitoring and logging solutions to track API usage, detect anomalies, and troubleshoot issues effectively. Tools like Elasticsearch and Kibana or third-party services like Sentry can be valuable for this purpose.


8. Documentation
   Continuously update and expand the project's documentation. Well-documented APIs are easier for developers to understand and integrate into their applications.

These are just a few ideas to consider for future enhancements and refinements of the API project. The direction you choose will depend on the evolving needs of your application and its users.
