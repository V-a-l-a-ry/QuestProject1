# PROJECT STRUCTURE
### 1. Directory Layout
The project follows a standard Laravel directory structure. Below is an overview of the key directories and files:

app/

Http/
Controllers/: Contains the controllers that handle HTTP requests.
Middleware/: Contains the middleware classes that filter HTTP requests.
Models/: Contains the Eloquent models that represent the database tables.
Providers/: Contains service providers that configure the application.
bootstrap/ 
Contains files for bootstrapping the Laravel framework and the cache/ directory.

config/

Contains configuration files for the application.

database/
migrations/: Contains database migration files for creating and modifying database tables.
factories/: Contains model factories for seeding the database.

public/

The entry point for the application, containing the index.php file and assets like images, JavaScript, and CSS.

resources/

views/: Contains the Blade templates used for rendering the HTML views.
css/: Contains custom CSS files.
js/: Contains custom JavaScript files.

routes/
web.php: Contains the routes for web requests.
api.php: Contains the routes for API requests.

storage/

Stores logs, compiled Blade templates, file-based sessions, and other temporary files.
tests/

Contains test cases for unit and feature testing.
vendor/

Contains the Composer dependencies.
### 2. Controllers and Routes


#### AuthController

Handles authentication, including login, registration, and logout.
Associated Routes: login, register, logout.

AdminDashboardController

Manages the admin dashboard, allowing the admin to oversee all aspects of the platform.
Associated Routes: admin/dashboard.

InternDashboardController

Manages the intern dashboard, providing access to profile, tasks, skills, and feedback.
Associated Routes: intern/dashboard.

ProfileController

Manages the creation and updating of intern profiles.
Associated Routes: intern/profile.

SkillController

Handles the skill development features, allowing interns to view and edit their skills.
Associated Routes: intern/skills.

FeedbackController

Allows the admin to provide feedback to individual interns or groups and displays feedback to interns.
Associated Routes: admin/feedback, intern/feedback.

GroupController

Manages intern groups, including creation, assignment, and management of group tasks.
Associated Routes: admin/group, intern/groups.
####  Route Configuration
Routes are defined in the routes/web.php file and are grouped based on the user role (admin or intern) using middleware for role-based access control.

# 3. Models and Relationships
### 3.1 Models
User:

Represents the users of the system, both admins and interns.
Relationships:
hasMany Groups: A user (intern) can belong to many groups.
hasMany Feedback: A user (admin) can provide feedback to many users or groups.

Profile:

Represents the profile information of an intern.
Relationships:
belongsTo User: Each profile is associated with one user.

Skill:

Represents the skills that an intern is developing.
Relationships:
belongsTo User: Each skill is associated with one user.

Group:

Represents a group of interns working together.
Relationships:
belongsToMany Users: A group can have many users (interns), and a user can belong to many groups.
Feedback:

Represents feedback provided by the admin.
Relationships:
morphTo feedbackable: Feedback can be provided to either a user (intern) or a group.
#### 3.2. Relationships
User and Profile:

One-to-One Relationship: Each user has one profile.
php

User and Skill:

One-to-Many Relationship: Each user (intern) can have many skills.

User and Group:

Many-to-Many Relationship: A user can belong to multiple groups, and each group can have multiple users.

Feedback and User/Group:

Polymorphic Relationship: Feedback can be provided to either a user or a group.



# DATABASE

### Introduction
The database is designed to manage user data, tasks, feedback, and related entities for the intern management system. The schema ensures data consistency and integrity, supporting all key features of the application.

### Entity Descriptions
- **Users Table**: Contains basic user information, including usernames, email addresses, and roles (admin, intern).
- **Profiles Table**: Stores additional profile details such as bio, skills, and contact information for each user.
- **Tasks Table**: Records tasks assigned to interns, tracking their status and deadlines.
- **Feedback Table**: Logs feedback provided by admins, linked to either individual interns or groups.

### Relationships
- **One-to-One**: Each user has a corresponding profile.
- **One-to-Many**: Admins can assign multiple tasks to interns.
- **Many-to-Many**: Interns are associated with multiple groups, and each group can include many interns.
### ERD 
![Database Schema](/images/schema.png)
Figure 2: ER Diagram illustrating the relationships between the main tables in the database.

### Key Fields and Indexes
- **Primary Keys**: Each table has a unique primary key (e.g., `user_id`, `task_id`).
- **Foreign Keys**: Relationships between tables are enforced by foreign key constraints (e.g., `user_id` in the `Profiles` table references `user_id` in the `Users` table).
- **Indexes**: Indexes are applied to frequently queried fields to optimize performance.

The database is normalized to the third normal form (3NF) to eliminate redundancy and ensure data integrity. Sensitive data, such as passwords, are encrypted using industry-standard encryption techniques.

###  TABLES
#### User Table
![User Table](/images/DB.jpeg)

