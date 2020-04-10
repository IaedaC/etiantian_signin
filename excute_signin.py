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

driver = webdriver.Chrome()
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
    # 刷新页面使cookies生效
    driver.maximize_window()
	# 最大化页面
    driver.find_element(By.CSS_SELECTOR, ".accountLoginBtn").click()
    driver.close
	# 点击登录按钮 & 关闭页面
    time.sleep(3)
	# 延迟 3s 等待加载
    driver.get('https://school.etiantian.com/ecampus/stulist/index.html')
    # 打开学生作业
    time.sleep(1)
	# 延迟 1s 等待加载
    ActionChains(driver).move_by_offset(x1, y1).click().perform()
	# 选择学科
    time.sleep(1)
	# 延迟 1s 等待加载
    ActionChains(driver).move_by_offset(x2, y2).click().perform()
	# 选择最后一场直播
    time.sleep(3)
	# 延迟 3s 等待直播间加载
    driver.quit()
	# 退出

