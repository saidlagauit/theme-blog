# Blog Theme

Blog Theme is a web application project built using the Laravel framework. The goal of this project is to create a personal blog consisting of several pages: Home, Blog, About Me, and Contact Me.

## Features

- Home page to showcase featured articles.
- Blog page to display all articles in chronological order.
- About Me page to introduce the author.
- Contact Me page containing a contact form.

## Installation and Usage

1. Clone this repository to your computer using the following command:

   ```
   git clone https://github.com/saidlagauit/theme-blog.git
   ```

2. Navigate to the project directory:

   ```
   cd theme-blog
   ```

3. Copy the `.env.example` file to `.env` and modify the database settings and any other configurations:

   ```
   cp .env.example .env
   ```

4. Install the dependencies using Composer:

   ```
   composer install
   ```

5. Generate the application key:

   ```
   php artisan key:generate
   ```

6. Run the cache optimization task:

   ```
   php artisan optimize
   ```

7. Start the development server:

   ```
   php artisan serve
   ```

8. Open a web browser and go to `http://127.0.0.1:8000` to view your personal blog.

## Issues

If you have any questions or run into issues, please open a new issue in the Issues section of this repository.

---

Blog Theme was developed using Laravel. Copyright © Said Lagauit.
