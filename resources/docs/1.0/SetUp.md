# 1.INSTALLATION

 Detailed installation instructions and environment configuration for setting up your Laravel project locally. 


#### 1.1. Prerequisites
PHP v8.2.12
Composer version >= 2.7.7 
Node.js and npm >= v20.17.0, npm >= v10.8.2
Git 
 web server Apache 

#### 1.2. Clone the Repository
git clone https://github.com/your-username/your-project.git
cd your-project

#### 1.3. Install PHP Dependencies
composer install

#### 1.4. Install Node.js Dependencies
npm install
npm run dev

#### 1.5. Set Up the Database
Create a database for the project using MySQL,  SQLite

#### 1.6. Migrate the Database

php artisan migrate

#### 1.8. Serve the Application

php artisan serve
This will start the application, and you can access it in your web browser at http://localhost:8000.

## 2. Environment Configuration

#### 2.1. Create the .env File
cp .env.example .env
#### 2.2. Configure the .env File
Open the .env file in a text editor and configure the following settings:

App Key: Generate an application key, which is used for encryption.

php artisan key:generate
This command will update the APP_KEY in the .env file.

Database Configuration: 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

#### 2.3. Caching Configurations (Optional)
For production environments, you can cache configurations for better performance.

php artisan config:cache