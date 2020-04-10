from selenium import webdriver
import time
import json

driver = webdriver.Chrome()
driver.get('https://school.etiantian.com/hbqhd1z/elogin/#/')

time.sleep(20)
# wait_login

with open('cookies.txt','w') as cookief:
    # save cookies as json
    cookief.write(json.dumps(driver.get_cookies()))

driver.quit()
