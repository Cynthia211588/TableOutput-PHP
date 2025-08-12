# Simple PHP CSV Table Display & Processing

## Project Overview

This is a simple PHP project that reads a default CSV file included in the project folder, displays its content in a table, and performs basic calculations on certain CSV values. The results are shown in a second table below the original data.
---

## Features

- Reads CSV file ('Table_Input.csv') and displays the data.
- Calculates:
  - **Alpha** = A5 + A20
  - **Beta** = A15 ÷ A7 (integer division)
  - **Charlie** = A13 × A12
- Shows calculation results in a table 2.

---

## What you need to prepare?
1. Make sure the CSV file exists in ('Table_Input.csv') with this format:
<pre>
Index,Value
A1,41
A2,18
A3,21
...
A20,10
</pre>

2. Run the application locally using a PHP server:
Start the built-in PHP server:  
- If you use WAMP, place the project folder in C:\wamp64\www\Mulah (or your chosen folder inside www).
- Start WAMP server.
- Open your browser and go to:
  -http://localhost/Mulah/index.php

3. The page will display the CSV table and calculated values.

