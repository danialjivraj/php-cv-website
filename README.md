# php-cv-website
This project is built using PHP and features a home page that showcases a list of all CVs available on the website.<br>

Non-users can perform the following actions:
 - Register
 - Go to Log in page
 - Check the CVs displayed in the Home page
 - Press on More Details for a particular profile

In addition to the above, registered users can:
  - Check and update their profiles
  - Log out

## Run the Website
You can run the website through [XAMPP](https://www.apachefriends.org/).

Populate the localhost database with the following:
```
CREATE TABLE cvs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    keyprogramming VARCHAR(100) NOT NULL,
    profile TEXT NOT NULL,
    education TEXT NOT NULL,
    URLlinks VARCHAR(255) NOT NULL
);
```

## Preview
Home Page
![image](https://github.com/danialjivraj/php-cv-website/assets/61945058/c77aaed6-da26-45c9-9c95-f6d299e42307)
Register
![image](https://github.com/danialjivraj/php-cv-website/assets/61945058/52363bf8-dcd6-4e18-83e6-17f425098980)
More Details
![image](https://github.com/danialjivraj/php-cv-website/assets/61945058/ef2515d0-ab0c-4a1a-bb03-b845e60d60c3)
Profile
![image](https://github.com/danialjivraj/php-cv-website/assets/61945058/d5e632df-c791-4438-bea3-e2b7a5d05f15)

