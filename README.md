# CRUD Capable WebGIS

A PHP + Leaflet web mapping app for viewing, filtering, and editing utility assets (valves, pipelines, buildings) stored in PostGIS. The UI provides a sidebar-driven workflow and map tools for drawing and measurement.

## Features
- Interactive Leaflet map with multiple base layers
- Sidebar with tabs for Home, Valves, Pipelines, and Buildings
- Filter assets by DMA and search by ID
- Create, update, and delete assets with geometry drawing tools
- Mini map, zoom bar, and measurement tools

## Tech Stack
- PHP (server-side)
- PostgreSQL + PostGIS (spatial storage)
- Leaflet + plugins (sidebar, geoman, minimap, zoom bar, polyline measure)
- jQuery, jQuery UI, Bootstrap

## Project Structure
- `index.php` UI, map setup, and client-side logic
- `init.php` DB connection + write token guard
- `load_data.php` Load features by DMA
- `find_data.php` Search a single feature by ID
- `insert_data.php` Insert new features
- `update_data.php` Update existing features
- `delete_data.php` Delete features
- `styles.css` App styles and sidebar overrides
- `plugins/` Leaflet plugins
- `source/` Local JS/CSS assets

## Prerequisites
- PHP 7.4+ (via XAMPP or similar)
- PostgreSQL with PostGIS enabled
- Web server (Apache recommended for XAMPP)

## Setup
1. Clone the repo into your web server document root.
2. Configure the database connection (see below).
3. Ensure the database tables exist (see schema outline).
4. Start Apache/PHP and open the app in your browser.

Example local URL for XAMPP:
`http://localhost/batch3/webgis/`

## Configuration
`init.php` loads DB settings from a PHP config file or environment variables. The default path in code is:
- `/home/kunmiade/config/db.php`

If you use a different path (e.g., on macOS/XAMPP), update the path in `init.php` or use environment variables.

### Config file format
Create a PHP file that returns the following keys:

```php
<?php
return [
  'dsn' => 'pgsql:host=HOST;dbname=DB;port=PORT;sslmode=require',
  'user' => 'DB_USER',
  'pass' => 'DB_PASSWORD',
  'token' => 'WRITE_TOKEN'
];
```

### Environment variables (optional)
- `WEBMAP_DSN`
- `WEBMAP_DB_USER`
- `WEBMAP_DB_PASS`
- `WEBMAP_WRITE_TOKEN`

## Write Access Token
Create/update/delete endpoints require a token. The frontend sends it as the `X-WEBMAP-TOKEN` header. You can also pass it as `token` in POST data.

## Database Schema (outline)
This app expects PostGIS geometry stored as `geom` with SRID 4326.

- `valves`
  - `valve_database_id` (PK)
  - `valve_id`
  - `valve_type`
  - `valve_dma_id`
  - `valve_diameter`
  - `valve_visibility`
  - `valve_location`
  - `geom` (geometry)

- `pipelines`
  - `pipeline_database_id` (PK)
  - `pipe_id`
  - `pipeline_category`
  - `pipeline_dma_id`
  - `pipeline_diameter`
  - `pipeline_material`
  - `pipeline_location`
  - `length`
  - `geom` (geometry)

- `buildings`
  - `building_database_id` (PK)
  - `account_no`
  - `building_category`
  - `building_dma_id`
  - `building_storey`
  - `building_population`
  - `building_location`
  - `geom` (geometry)

## API Endpoints (POST)
- `load_data.php`
  - `table`: `valves|pipelines|buildings`
  - `dma_id`
- `find_data.php`
  - `table`: `valves|pipelines|buildings`
  - `field`: `valve_id|pipe_id|account_no`
  - `value`
- `insert_data.php` / `update_data.php` / `delete_data.php`
  - `request`: `valves|pipelines|buildings`
  - Requires `X-WEBMAP-TOKEN` or `token`


