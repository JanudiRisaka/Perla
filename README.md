<div align="center">

# PERLA

### Pearl Jewellery E-Commerce Website

A PHP and MySQL web application featuring a pearl jewellery storefront, customer accounts, shopping-cart and order workflows, and an administration area.

**Customer Storefront · Shopping Cart · Order Management · Admin Tools**

</div>

---

## Overview

## Overview

**Perla** is a pearl jewellery e-commerce website developed as a university academic project. The application was built using PHP and MySQL to demonstrate the development of a database-driven web application.

The project includes a customer-facing storefront and an administration area, allowing customers to browse jewellery, manage shopping carts, and place orders, while administrators can manage products, customers, enquiries, and orders.

The project provided practical experience in PHP development, database integration, CRUD operations, session management, and building functional web interfaces.

## Features

### Customer storefront

- Browse the jewellery catalogue.
- Filter products by category.
- View individual product details.
- Register and log in to a customer account.
- View customer profile and edit profile information.
- Add products to a shopping cart.
- Update cart quantities and remove cart items.
- Continue from the cart to create order records.
- View order-related information through the customer profile.
- Submit enquiries through the contact form.
- View the About page and terms/privacy information.

### Administration

- View the product catalogue in the admin area.
- Add, update, and delete product records.
- View customer information and customer profiles.
- Update customer status.
- Review customer enquiries and update their replied status.
- View orders, update delivery status, and delete order records.
- View the administrator profile.

> **Payment:** Customers can add products to their cart and place orders through the checkout process. Online payment integration was not implemented, as it was outside the scope of this project.

## Screenshots

The screenshots below are stored in the repository and show the current application interface.

### Customer experience

#### Homepage

![Perla homepage](docs/screenshots/customer/homepage.png)

#### About Perla

![About Perla](docs/screenshots/customer/about-us.png)

#### Jewellery catalogue

![Jewellery catalogue](docs/screenshots/customer/jewellery-catalog.png)

#### Product details

![Product details](docs/screenshots/customer/product-details.png)

#### Shopping cart

![Shopping cart](docs/screenshots/customer/shopping-cart.png)

#### Account pages

| Login | Registration |
|---|---|
| ![Customer login](docs/screenshots/customer/login.png) | ![Customer registration](docs/screenshots/customer/registration.png) |

#### Contact and enquiries

![Contact page](docs/screenshots/customer/contact-us.png)

### Administration

#### Product management

![Admin product management](docs/screenshots/admin/product-management.png)

#### Add a product

![Admin add product](docs/screenshots/admin/admin-add-product.png)

#### Update products

![Admin product update](docs/screenshots/admin/product-update.png)

#### Customer management

![Admin customer management](docs/screenshots/admin/customer-management.png)

#### Customer profile

![Admin customer profile](docs/screenshots/admin/customer-profile.png)

#### Enquiry management

![Admin enquiry management](docs/screenshots/admin/inquiry-management.png)

#### Order management

![Admin order management](docs/screenshots/admin/order-management.png)

#### Administrator profile

![Admin profile](docs/screenshots/admin/admin-profile.png)

## Technology Stack

| Area | Technology |
|---|---|
| Back end | PHP |
| Database | MySQL / MySQLi |
| Front end | HTML, CSS, JavaScript |
| Local web server | Apache |
| Suggested local environment | XAMPP |

## Project Structure

```text
Perla/
├── css/                         # Page and shared stylesheets
├── database/
│   └── perla.sql                # MySQL database export
├── docs/
│   └── screenshots/
│       ├── customer/            # Storefront and customer-page screenshots
│       └── admin/               # Administration-page screenshots
├── images/                      # Product and website image assets
├── js/                          # Client-side JavaScript
├── AboutUs.php
├── AdminCustomer.php
├── AdminInquiry.php
├── AdminOrder.php
├── AdminProduct.php
├── AdminProductAdd.php
├── AdminProductUpdate.php
├── AdminProfile.php
├── Cart.php
├── config.php                   # MySQL connection settings
├── ContactUs.php
├── EditUserProfile.php
├── Homepage.php
├── LoginProcess.php
├── LogOut.php
├── ProductDetails.php
├── Products.php
├── Profile.php
├── Register.php
├── Terms&privacy.html
└── README.md
```

## Getting Started

### Prerequisites

Before setting up the project, make sure you have installed [XAMPP](https://www.apachefriends.org/), which provides the Apache web server, PHP, and MySQL.

### 1. Clone the Repository

Clone the project from GitHub:

```bash
git clone https://github.com/JanudiRisaka/Perla.git
```

Move the cloned `Perla` folder into the XAMPP web server document root, usually located at `C:\xampp\htdocs\`.

After moving the project, your directory structure should look like this:

```text
C:\xampp\htdocs\
│
└── Perla\

### 2. Prepare the Database

The application requires a MySQL database named `perla`. A database export containing the required table structures and sample data is provided in `database/perla.sql`.

To import the database using phpMyAdmin:

1. Open the XAMPP Control Panel.
2. Start the **Apache** and **MySQL** services by clicking the **Start** button next to each.
3. Open [phpMyAdmin](http://localhost/phpmyadmin/).
4. Create a new database named `perla` if it does not already exist.
5. Select the `perla` database.
6. Navigate to the **Import** tab.
7. Click **Choose File** and select `database/perla.sql` from the project folder.
8. Click **Import** or **Go** to execute the SQL file.

The database export includes the following tables:

- `tbluser`
- `tbladmin`
- `tblproduct`
- `tblcart`
- `tblorder`
- `tblcontain`
- `tblfaq`

The database also includes fictional demonstration data for testing the application's functionality.

### 3. Configure the Database Connection

The project includes a `config.example.php` file containing the sample database connection configuration.

1. Copy `config.example.php` and rename the copied file to `config.php`.
2. Open `config.php` and update the database credentials according to your local MySQL configuration.
3. Save the file.

**Note:** The `config.php` file contains local database configuration and is excluded from Git tracking. Only `config.example.php` is included in the repository.

### 4. Run the Application

Ensure that Apache and MySQL are running in the XAMPP Control Panel.

Open your web browser and navigate to:

```text
http://localhost/Perla/Homepage.php
```

The Perla homepage should now be accessible locally.

If you used a different project folder name, adjust the URL accordingly.

## Main Application Pages

### Prerequisites

Install a local PHP and MySQL environment, such as [XAMPP](https://www.apachefriends.org/), with:

- Apache
- PHP with the MySQLi extension
- MySQL or MariaDB
- phpMyAdmin (optional)

### 1. Clone the repository

```bash
git clone https://github.com/JanudiRisaka/Perla.git
```

Move the project folder into the web server document root. With a standard XAMPP installation, this is usually `htdocs`.

For example, after moving the project, the directory structure should look like this:

C:\xampp\htdocs\
│
└── Perla\

### 2. Prepare the database

The application expects a MySQL database named `perla`. A database export is included at `database/perla.sql`.

To import it using phpMyAdmin:

1. Open the XAMPP Control Panel.
2.Start the Apache and MySQL services by clicking the Start button. Wait until both services are running successfully.
3. Open [phpMyAdmin](http://localhost/phpmyadmin/).
4. Create a database named `perla`.
5. Select the `perla` database.
6. Open the **Import** tab.
7. Choose `Perla/database/perla.sql` and click **Import**.

The export contains the application's tables, including `tbluser`, `tbladmin`, `tblproduct`, `tblcart`, `tblorder`, `tblcontain`, and `tblfaq`.

### 3. Configure the database connection

1. Copy `config.example.php` and rename it to `config.php`.
2. Update the database credentials in `config.php`.
3. Save the file and verify the database connection.

**Note:** `config.php` is excluded from Git tracking. Only `config.example.php` is included in the repository.

### 4. Admin Login

Use the following demonstration credentials to access the administration dashboard:

| Field | Value |
|---|---|
| Email | admin1@gmail.com |
| Password | J72J4g4Pf5dEtcNR |

**Note:** These credentials are provided for demonstration purposes only.

### 5. Run the application

Start Apache and MySQL, then open:

```text
http://localhost/Perla/Homepage.php
```

Adjust the URL if your project folder has a different name.

## Main Application Pages

| Page | Purpose |
|---|---|
| `Homepage.php` | Storefront homepage |
| `Products.php` | Product catalogue and category filtering |
| `ProductDetails.php` | Individual product information and add-to-cart action |
| `Register.php` | Customer registration |
| `LoginProcess.php` | Customer and administrator login |
| `Profile.php` | Customer profile and order-related information |
| `EditUserProfile.php` | Customer profile editing |
| `Cart.php` | Cart management and order submission |
| `ContactUs.php` | Customer enquiry submission |
| `AdminProduct.php` | Product administration |
| `AdminCustomer.php` | Customer administration |
| `AdminInquiry.php` | Enquiry administration |
| `AdminOrder.php` | Order and delivery-status administration |
| `AdminProfile.php` | Administrator profile |

## Demo Video

A project walkthrough video can be added here once it has been recorded.

**Video:** Coming soon

## ⚠️ Known Limitations and Security Considerations

As an academic project, Perla was developed to demonstrate fundamental web development concepts and e-commerce functionality within the scope of the university assignment.

Some areas could be further improved to meet modern production-level security, performance, scalability, and usability standards.

The following limitations and potential improvements are documented for future reference.

### 🔐 1. Security & Authentication

| Area | Current Limitation | Recommended Improvement |
|---|---|---|
| Password Storage | Passwords are stored in plaintext. | Implement secure password hashing using `password_hash()` and `password_verify()`. |
| SQL Injection | Some queries directly incorporate user input. | Use prepared statements for all database queries involving variable data. |
| Session Management | Session security requires improvement. | Implement secure session handling, session regeneration, and appropriate expiration. |
| Admin Authorization | Administrative access controls require further review. | Enforce server-side authorization checks on every admin endpoint. |
| Input Validation | User input validation is limited. | Implement comprehensive server-side validation. |
| XSS Protection | User-generated content requires safer output handling. | Escape dynamic content before displaying it in HTML. |
| CSRF Protection | Forms require additional protection. | Implement CSRF tokens for state-changing requests. |
| File Uploads | File-upload security requires improvement. | Validate file types, extensions, sizes, and uploaded content. |

### 🗄️ 2. Database & Data Management

| Area | Current Limitation | Recommended Improvement |
|---|---|---|
| Database Relationships | Database relationships require further review. | Introduce appropriate foreign keys and constraints. |
| Data Integrity | Data consistency needs improvement. | Use database transactions for related operations. |
| Error Handling | Database errors require safer handling. | Log technical errors without exposing sensitive details to users. |
| Data Validation | Database inputs require additional validation. | Validate data before inserting or updating records. |
| Database Backups | No automated backup functionality is implemented. | Introduce a regular database backup strategy. |

### 🛒 3. E-Commerce Functionality

| Area | Current Limitation | Recommended Improvement |
|---|---|---|
| Online Payments | Payment integration was outside the project scope. | Consider integrating a payment gateway if the project scope expands. |
| Order Processing | Order workflows provide basic functionality. | Improve order validation and lifecycle management. |
| Inventory Management | Stock management requires further development. | Implement real-time stock tracking and availability checks. |
| Shopping Cart | Cart functionality can be further improved. | Improve cart persistence and quantity validation. |
| Order Tracking | Delivery status management is available. | Introduce more detailed order tracking and status history. |
| Product Management | Basic product management functionality is available. | Improve product categorization, search, and filtering. |

### 🎨 4. User Interface & User Experience

- **Responsive Design:** Further improve layouts for mobile phones, tablets, and different screen sizes.
- **Accessibility:** Improve keyboard navigation, form labels, image descriptions, and colour contrast.
- **Navigation:** Improve consistency and usability across customer and administrator pages.
- **Form Feedback:** Provide clearer validation messages and success/error notifications.
- **Loading States:** Introduce appropriate loading indicators for operations that take time.
- **Visual Consistency:** Standardize typography, spacing, buttons, colours, and interface components.

### ⚙️ 5. Performance & Reliability

- **Code Organization:** Improve code reusability and separate application logic from presentation.
- **Database Performance:** Optimize queries and introduce appropriate database indexes.
- **Error Handling:** Implement consistent application-level error handling.
- **Maintainability:** Reduce duplicated code and adopt a more structured project organization.
- **Scalability:** Improve the application architecture to support future functionality and increased usage.

### 🧪 6. Testing & Quality Assurance

- **Unit Testing:** Introduce tests for individual application functions.
- **Integration Testing:** Verify interactions between PHP components and the MySQL database.
- **Functional Testing:** Test customer registration, login, product browsing, cart operations, and order workflows.
- **Admin Testing:** Verify product, customer, enquiry, and order management operations.
- **Security Testing:** Test authentication, authorization, input validation, and common web vulnerabilities.
- **Cross-Browser Testing:** Verify application behaviour across different browsers and devices.

---

**Note:** The items above describe identified limitations and potential improvements. Recommended improvements have not necessarily been implemented or tested.

---

<div align="center">

**PERLA** · Pearl Jewellery E-Commerce Website

</div>