import json
import time
import sys

from selenium import webdriver
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.by import By

x1 = sys.argv[1]
y1 = sys.argv[2]
x2 = sys.argv[3]
y2 = sys.argv[4]

opts = webdriver.ChromeOptions()
opts.headless = True
opts.add_argument("--window-size=1920,1080")

driver = webdriver.Chrome(options=opts)
driver.get('https://school.etiantian.com/hbqhd1z/elogin/#/')
driver.delete_all_cookies()
# 重置cookies

with open('cookies.txt','r') as cookief:
    cookieslist = json.load(cookief)
	# 读取cookies
    for cookie in cookieslist:
        if isinstance(cookie.get('expiry'), float):
            cookie['expiry'] = int(cookie['expiry'])
        # 改expiry为int类型
        driver.add_cookie(cookie)
        # 加载cookies
    driver.refresh()
    print("刷新页面使 cookies 生效")
    driver.find_element(By.CSS_SELECTOR, ".accountLoginBtn").click()
    driver.close
    print("点击登录按钮 & 关闭页面")
    time.sleep(3)
    print("等待加载")
    driver.get('https://school.etiantian.com/ecampus/stulist/index.html')
    print("打开学生作业")
    time.sleep(1)
    print("等待加载")
    ActionChains(driver).move_by_offset(x1, y1).click().perform()
    print("选择学科")
    time.sleep(1)
    print("等待加载")
    ActionChains(driver).move_by_offset(x2, y2).click().perform()
    print("选择最后一场直播")
    time.sleep(3)
    print("等待加载")
    driver.quit()
    print("完成，结束")

