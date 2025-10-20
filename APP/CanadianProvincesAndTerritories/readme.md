# Canadian Provinces & Territories Information System

A comprehensive PHP web application that provides detailed information about Canada's provinces and territories. Built with **PHP • HTML5 • CSS3 • Object-Oriented Programming**

## Features

- **Secure Authentication System** - Session-based login protection
- **Object-Oriented Architecture** - Four-tier class hierarchy with inheritance
- **Comprehensive Data** - Detailed information about Canadian provinces and territories
- **Advanced Calculations** - Sorting, filtering, and statistical analysis
- **Responsive Design** - Modern CSS with gradient backgrounds and mobile optimization
- **Session Management** - Secure access control with logout functionality

## Project Structure

```
canada-provinces-app/
├── index.html                 # Login page
├── login.php                  # Authentication handler
├── logout.php                 # Session destruction
├── process.php                # Province selection form
├── one_place_result.php       # Individual province display
├── all_places_result.php      # All provinces with calculations
├── ProvinceAndTerritories.php # Base class
├── Characteristics.php        # Extended characteristics class
├── Symbols.php                # Symbols and images class
├── Calculate.php              # Calculation and analysis class
├── style.css                  # Modern styling
└── readme.md                  # Information page

```

## Authentication

**Default Login Credentials:**
- Username: `admin`
- Password: `passWORD123@`

*Note: In a production environment, implement proper password hashing and database storage.*

## Class Hierarchy

### 1. ProvinceAndTerritories (Base Class)
- Name
- Postal abbreviation
- Coordinates
- Confederation date

### 2. Characteristics (Extends ProvinceAndTerritories)
- Capital city
- Largest city
- Official languages
- Time zone
- Area measurements (total, land, water)
- Population
- Geographic image URL

### 3. Symbols (Extends Characteristics)
- Motto
- Flag image URL
- Coat of arms image URL

### 4. Calculate (Extends Symbols)
- Ascending/descending ordering
- Greatest/lowest value calculations
- Text and numeric data processing

## Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- Web server (Apache, Nginx, or built-in PHP server)
- Modern web browser

### Quick Start
1. Clone or download the project files to your web server directory
2. Ensure all PHP files are in the same directory
3. Start your web server
4. Navigate to `index.html` in your browser
5. Use the credentials above to login

### Using PHP Built-in Server
```bash
# Navigate to project directory
cd canada-provinces-app

# Start PHP development server
php -S localhost:8000

# Access application at http://localhost:8000
```

## Usage Guide

### 1. Login
- Access the application through `index.html`
- Enter username and password
- Session authentication protects all subsequent pages

### 2. Select Province
- Choose from dropdown list of 13 provinces and territories
- Includes all Canadian provinces and territories

### 3. View Individual Province
- Comprehensive data display in organized sections
- Basic information, characteristics, and symbols
- High-quality images of flags, coat of arms, and maps
- Responsive image gallery

### 4. View All Provinces Analysis
- Sorting by name (A-Z) and population (high-low)
- Statistical highlights:
  - Largest/smallest by area
  - Longest/shortest mottos
- Comparative data visualization

### 5. Navigation
- Search another province from any results page
- View all provinces data from individual province page
- Logout button available on all authenticated pages

## Security Features

- **Session Protection**: All data pages require authentication
- **Access Control**: Unauthorized users redirected to login
- **Session Destruction**: Proper logout functionality
- **Input Validation**: Form validation and secure data handling

## Design Features

- **Modern CSS**: Gradient backgrounds and shadow effects
- **Responsive Grid**: Adapts to mobile and desktop screens
- **Interactive Elements**: Hover effects and smooth transitions
- **Clean Typography**: Readable fonts and proper hierarchy
- **Organized Layout**: Logical information grouping

## Calculation Capabilities

### Sorting Operations
- **Text Data**: Alphabetical ordering (A-Z, Z-A)
- **Numeric Data**: Numerical ordering (low-high, high-low)
- **Supported Fields**: Name, population, area, motto length

### Statistical Analysis
- **Greatest Value**: Maximum numeric value or longest text
- **Lowest Value**: Minimum numeric value or shortest text
- **Multi-field Support**: Works with various data types

## Data Coverage

### Provinces Included:
- Alberta
- British Columbia  
- Manitoba
- New Brunswick
- Newfoundland and Labrador
- Nova Scotia
- Ontario
- Prince Edward Island
- Quebec
- Saskatchewan

### Territories Included:
- Northwest Territories
- Nunavut
- Yukon

## Technical Details

### PHP Features Used
- Object-Oriented Programming (OOP)
- Class inheritance and method overriding
- Session management (`session_start()`, `session_destroy()`)
- Array manipulation and sorting algorithms
- Static methods and properties

### CSS Features
- CSS Grid and Flexbox layouts
- CSS custom properties (variables)
- Gradient backgrounds and box shadows
- Responsive media queries
- Smooth transitions and transforms

### HTML5 Features
- Semantic HTML structure
- Form validation attributes
- Accessible form labels
- Responsive images

## Security Notes

- This demo uses simple authentication for educational purposes
- Production applications should implement:
  - Password hashing (bcrypt)
  - Database storage for credentials
  - CSRF protection
  - Input sanitization
  - HTTPS encryption

## Extension Ideas

- Add more provinces and territories with complete data
- Implement database storage instead of hard-coded arrays
- Add search functionality across all fields
- Include historical data and timeline views
- Add interactive maps with province boundaries
- Implement data export (CSV, PDF)
- Add user roles and permissions
- Include population growth charts

## Troubleshooting

### Common Issues:

1. **Session not working**
   - Check PHP session configuration
   - Ensure cookies are enabled in browser

2. **Pages not loading**
   - Verify all files are in the same directory
   - Check PHP error logs for specific issues

3. **Images not displaying**
   - Check internet connection (images loaded from Wikimedia)
   - Verify image URLs are accessible

4. **Styling issues**
   - Ensure CSS file is in correct location
   - Check browser console for CSS errors

## Tools
1. I used https://www.image-map.net/ to generate the coordinates of each province and territory in the image map. 
   <map name="image-map"> <area coords='?'> ...

2. I used deepseek to find the data about the provinces and territories (available in Wikipedia) and create the base structure of the app.

3. I used ... to download the images

4. I create the classes and the final structure of the app myself. 

## License

This project is for educational purposes. Feel free to modify and extend for your own use.

## Contributing

Feel free to submit issues and enhancement requests! 



