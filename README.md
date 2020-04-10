# 河北秦皇岛一中在线课程自动签到
一个简单的Python+Selenium程序，用来实现在秦皇岛一中的网课平台school.etiantian.com自动签到
## 使用说明
### 准备工作
**1.安装 Python3**  
参考：https://www.runoob.com/python3/python3-install.html  
  
**2.配置Google Chrome & chromedriver**  
下载并安装Chrome：https://www.google.cn/chrome/  
配置chromedriver参考：https://blog.csdn.net/weixin_43901998/article/details/88087832  
（一定要配置chromedriver的环境变量）

**3.安装 Python 的 Selenium 库**  
若速度较慢，可使用科大源镜像，请在命令行输入  
`"pip install selenium -i https://pypi.mirrors.ustc.edu.cn/simple/ --trusted-host pypi.mirrors.ustc.edu.cn/simple/"`  
  
### How to work?
#### 原理
鉴于学校统计学生是否上课的标准是某个课程在平台内是否显示为“完成”状态，因此我们只需模拟点击一次当日课程的直播间，使其变为“完成”状态即可。  
由于school.etiantian.com使用了大量的css伪元素，很难利用xpath或者css selector进行元素定位，因此采取的是比较低级的ActionChains模拟鼠标点击方式来实现相关功能，若有更好的方法欢迎提供~  
  
#### 测量坐标  
由于每台电脑的分辨率和显示比例并不一致，因此我们需要先确定各个按钮所在的位置，即对程序进行初始化。   
之前已经安装了Chrome浏览器，我们需要它的一个名为"Page Ruler Redux"的插件来测量坐标，可以自行搜索或是前往Chrome网上应用店下载（后者可能需要科学上网工具）。
  
#### 获取自动登录网课平台的Cookies  
  
  
#### 编写启动脚本  

#### 配置定时任务  
