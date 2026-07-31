import pytest
import time
import os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.webdriver.edge.service import Service
from webdriver_manager.microsoft import EdgeChromiumDriverManager

# --- URLs ---
BASE_URL = "http://localhost/WEB%20TECH%20PROJECT/WEB-TECH/PROJECT/ADMIN/VIEW/homepage.php"
LOGIN_URL = "http://localhost/WEB%20TECH%20PROJECT/WEB-TECH/PROJECT/ADMIN/VIEW/login.php"
ROOMS_URL = "http://localhost/WEB%20TECH%20PROJECT/WEB-TECH/PROJECT/ADMIN/VIEW/rooms.php"
HOUSEKEEPING_URL = "http://localhost/WEB%20TECH%20PROJECT/WEB-TECH/PROJECT/ADMIN/VIEW/housekeeping.php"
CUSTOMERS_URL = "http://localhost/WEB%20TECH%20PROJECT/WEB-TECH/PROJECT/ADMIN/VIEW/customers.php"
BILLING_URL = "http://localhost/WEB%20TECH%20PROJECT/WEB-TECH/PROJECT/ADMIN/VIEW/Billing.php"
BOOKINGS_URL = "http://localhost/WEB%20TECH%20PROJECT/WEB-TECH/PROJECT/ADMIN/VIEW/booking.php"

@pytest.fixture(scope="module")
def driver():
    """Initializes Microsoft Edge WebDriver."""
    service = Service(EdgeChromiumDriverManager().install())
    options = webdriver.EdgeOptions()
    
    driver = webdriver.Edge(service=service, options=options)
    driver.implicitly_wait(10)
    driver.maximize_window()
    
    yield driver
    driver.quit()


# --- TEST 1: Homepage Navigation ---
def test_homepage_loads_and_admin_navigates(driver):
    driver.get(BASE_URL)
    time.sleep(2)

    heading = driver.find_element(By.XPATH, "//h1[contains(text(), 'Hotel Management System')]")
    assert heading.is_displayed(), "Main heading 'Hotel Management System' was not found on the front page."

    admin_btn = driver.find_element(By.XPATH, "//*[contains(text(), 'Login as Admin')]")
    admin_btn.click()
    time.sleep(2)

    assert "admin" in driver.current_url.lower() or "login" in driver.current_url.lower(), "Failed to navigate to the Admin Login page."


# --- TEST 2: Admin Login ---
def test_admin_login(driver):
    driver.get(LOGIN_URL)
    time.sleep(2)

    heading = driver.find_element(By.XPATH, "//body//*[contains(text(), 'Welcome Admin')]")
    assert heading.is_displayed(), "'Welcome Admin' heading was not found."

    try:
        username_field = driver.find_element(By.NAME, "username")
    except:
        username_field = driver.find_element(By.XPATH, "//input[@type='text']")
        
    username_field.clear()
    username_field.send_keys("admin")
    time.sleep(1)

    try:
        password_field = driver.find_element(By.NAME, "password")
    except:
        password_field = driver.find_element(By.XPATH, "//input[@type='password']")
        
    password_field.clear()
    password_field.send_keys("123")
    time.sleep(1)

    try:
        remember_checkbox = driver.find_element(By.XPATH, "//input[@type='checkbox']")
        if not remember_checkbox.is_selected():
            remember_checkbox.click()
    except Exception as e:
        print(f"Warning: Could not click 'Remember Me' checkbox. Error: {e}")
    time.sleep(1)

    password_field.send_keys(Keys.RETURN)
    time.sleep(3) 

    current_url = driver.current_url.lower()
    assert "dashboard.php" in current_url, f"Login failed: Expected to be on dashboard.php, but URL is {current_url}"


# # --- TEST 3: Add Room ---
# def test_add_room(driver):
#     try:
#         rooms_sidebar_link = driver.find_element(By.XPATH, "//a[contains(text(), 'Rooms')]")
#         rooms_sidebar_link.click()
#     except:
#         driver.get(ROOMS_URL)
        
#     time.sleep(2)

#     heading = driver.find_element(By.XPATH, "//*[contains(text(), 'Room Management')]")
#     assert heading.is_displayed(), "'Room Management' heading was not found."

#     try:
#         try:
#             type_dropdown = Select(driver.find_element(By.NAME, "type"))
#         except:
#             type_dropdown = Select(driver.find_element(By.XPATH, "(//select)[1]"))
#         type_dropdown.select_by_visible_text("Deluxe")
        
#         try:
#             status_dropdown = Select(driver.find_element(By.NAME, "status"))
#         except:
#             status_dropdown = Select(driver.find_element(By.XPATH, "(//select)[2]"))
#         status_dropdown.select_by_visible_text("Available")

#     except Exception as e:
#         pytest.fail(f"Failed to set Type or Status dropdown fields. Error: {e}")

#     image_path = "C:\\path\\to\\your\\test_image.jpg" 
#     try:
#         file_input = driver.find_element(By.XPATH, "//input[@type='file']")
#         if not os.path.exists(image_path):
#             with open("test_image_temp.jpg", "w") as f:
#                 f.write("dummy content")
#             image_path = os.path.abspath("test_image_temp.jpg")
            
#         file_input.send_keys(image_path)
#     except Exception as e:
#         print(f"Warning: Could not interact with file upload. {e}")

#     time.sleep(1)

#     try:
#         add_btn = driver.find_element(By.XPATH, "//button[contains(text(), 'Add Room')] | //input[@type='submit' and @value='Add Room']")
#         add_btn.click()
#     except Exception as e:
#         print(f"Warning: Could not click Add Room button. {e}")
        
#     time.sleep(3) 


# # --- TEST 4: Update Housekeeping Status ---
# def test_update_cleaning_status(driver):
#     try:
#         housekeeping_sidebar = driver.find_element(By.XPATH, "//a[contains(text(), 'Housekeeping')]")
#         housekeeping_sidebar.click()
#     except:
#         driver.get(HOUSEKEEPING_URL)
    
#     time.sleep(2)

#     heading = driver.find_element(By.XPATH, "//*[contains(text(), 'Housekeeping Status')]")
#     assert heading.is_displayed(), "'Housekeeping Status' heading not found."

#     target_room = "102"
#     target_status = "Clean" 

#     try:
#         dropdown_xpath = f"//tr[td[normalize-space()='{target_room}']]//select"
#         status_dropdown = Select(driver.find_element(By.XPATH, dropdown_xpath))
#         status_dropdown.select_by_visible_text(target_status)
#     except Exception as e:
#         pytest.fail(f"Failed to find or select from dropdown for room {target_room}. Error: {e}")

#     time.sleep(1)

#     try:
#         update_btn_xpath = f"//tr[td[normalize-space()='{target_room}']]//button[contains(normalize-space(), 'Update')] | //tr[td[normalize-space()='{target_room}']]//input[@value='Update']"
#         update_btn = driver.find_element(By.XPATH, update_btn_xpath)
        
#         driver.execute_script("arguments[0].scrollIntoView(true);", update_btn)
#         time.sleep(0.5)
        
#         update_btn.click()
#     except Exception as e:
#         pytest.fail(f"Failed to click the Update button for room {target_room}. Error: {e}")

#     time.sleep(3) 


# # --- TEST 5: Add Customer ---
# def test_add_customer(driver):
#     try:
#         customers_sidebar = driver.find_element(By.XPATH, "//a[contains(text(), 'Customers')]")
#         customers_sidebar.click()
#     except:
#         driver.get(CUSTOMERS_URL)
    
#     time.sleep(2)

#     heading = driver.find_element(By.XPATH, "//*[contains(text(), 'Customer Management')]")
#     assert heading.is_displayed(), "'Customer Management' heading not found."

#     try:
#         name_input = driver.find_element(By.NAME, "name")
#         name_input.clear()
#         name_input.send_keys("Test Customer")
        
#         email_input = driver.find_element(By.NAME, "email")
#         email_input.clear()
#         unique_email = f"testcustomer_{int(time.time())}@gmail.com"
#         email_input.send_keys(unique_email)
        
#         phone_input = driver.find_element(By.NAME, "phone")
#         phone_input.clear()
#         phone_input.send_keys("01712345678")
            
#         password_input = driver.find_element(By.NAME, "password")
#         password_input.clear()
#         password_input.send_keys("pass1234")
        
#         try:
#             visits_input = driver.find_element(By.NAME, "total_visits")
#             visits_input.clear()
#             visits_input.send_keys("0")
#         except:
#             pass 
            
#     except Exception as e:
#         print(f"Warning: Form fields for adding a customer could not be completely filled. Check HTML 'name' attributes. Error: {e}")

#     time.sleep(1)

#     try:
#         add_customer_btn = driver.find_element(By.XPATH, "//button[contains(text(), 'Add Customer')] | //input[@value='Add Customer' or @type='submit']")
#         add_customer_btn.click()
#     except Exception as e:
#         print(f"Warning: Failed to click the Add Customer button. Error: {e}")

#     time.sleep(3) 


# --- TEST 6: Add a New Booking ---
def test_add_booking(driver):
    try:
        bookings_sidebar = driver.find_element(By.XPATH, "//a[contains(translate(text(), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'booking')]")
        bookings_sidebar.click()
    except:
        driver.get(BOOKINGS_URL)
    
    time.sleep(2)

    try:
        customer_dropdown = Select(driver.find_element(By.XPATH, "(//select)[1]"))
        customer_dropdown.select_by_index(len(customer_dropdown.options) - 1)
        
        room_dropdown = Select(driver.find_element(By.XPATH, "(//select)[2]"))
        room_dropdown.select_by_index(len(room_dropdown.options) - 1)
        
        try:
            checkin_input = driver.find_element(By.NAME, "checkin_date")
        except:
            checkin_input = driver.find_element(By.XPATH, "(//input[@type='date'])[1]")
        
        driver.execute_script("arguments[0].value = '2026-07-27';", checkin_input)

        try:
            checkout_input = driver.find_element(By.NAME, "checkout_date")
        except:
            checkout_input = driver.find_element(By.XPATH, "(//input[@type='date'])[2]")
            
        driver.execute_script("arguments[0].value = '2026-07-31';", checkout_input)
        
    except Exception as e:
        pytest.fail(f"Failed to interact with Booking form fields. Error: {e}")

    time.sleep(1)

    try:
        add_btn = driver.find_element(By.XPATH, "//button[contains(text(), 'Confirm Booking')] | //input[@type='submit']")
        add_btn.click()
    except Exception as e:
        print(f"Warning: Failed to click the Confirm Booking button. Error: {e}")

    time.sleep(3)


# --- TEST 7: Verify Booking Table ---
def test_verify_booking_table(driver):
    driver.get(BOOKINGS_URL)
    time.sleep(2)

    try:
        delete_btn = driver.find_element(By.XPATH, "//*[contains(text(), 'Delete')]")
        assert delete_btn.is_displayed(), "Booking table or Delete buttons are not visible."
    except Exception as e:
        pytest.fail(f"Failed to find booking entries in the table. Error: {e}")

    time.sleep(1)


# # --- TEST 8: Confirm Billing Invoice (Targeting Invoice #5) ---
# def test_billing_confirm(driver):
#     try:
#         billing_sidebar = driver.find_element(By.XPATH, "//a[contains(text(), 'Billing')]")
#         billing_sidebar.click()
#     except:
#         driver.get(BILLING_URL)
    
#     time.sleep(2)

#     heading = driver.find_element(By.XPATH, "//*[contains(text(), 'Invoices & Billing')]")
#     assert heading.is_displayed(), "'Invoices & Billing' heading not found."

#     # Updated to Invoice #5 based on the screenshot
#     target_invoice = "#5"
#     target_status = "Confirmed"

#     try:
#         dropdown_xpath = f"//tr[td[normalize-space()='{target_invoice}']]//select"
#         status_dropdown = Select(driver.find_element(By.XPATH, dropdown_xpath))
#         status_dropdown.select_by_visible_text(target_status)
#     except Exception as e:
#         pytest.fail(f"Failed to find or update dropdown for invoice {target_invoice}. Error: {e}")

#     time.sleep(3)


# # --- TEST 9: Submit Feedback ---
# def test_submit_feedback(driver):
#     driver.get(BASE_URL)
#     time.sleep(2)
    
#     driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
#     time.sleep(2)

#     try:
#         name_field = driver.find_element(By.NAME, "name")
#         name_field.clear()
#         name_field.send_keys("Selenium Tester")
        
#         email_field = driver.find_element(By.NAME, "email")
#         email_field.clear()
#         email_field.send_keys("tester@example.com")
        
#         message_field = driver.find_element(By.NAME, "message")
#         message_field.clear()
#         message_field.send_keys("This is an automated test feedback submission. The hotel UI looks great!")
        
#     except Exception as e:
#         pytest.fail(f"Failed to locate or interact with feedback form fields. Check HTML 'name' attributes. Error: {e}")
        
#     time.sleep(1)
    
#     try:
#         submit_btn = driver.find_element(By.XPATH, "//button[contains(text(), 'Submit Feedback')] | //input[@value='Submit Feedback'] | //button[contains(@class, 'btn')]")
#         driver.execute_script("arguments[0].click();", submit_btn)
#     except Exception as e:
#         pytest.fail(f"Failed to click the Submit Feedback button. Error: {e}")
        
#     time.sleep(3)