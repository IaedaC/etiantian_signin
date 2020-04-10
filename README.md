# 河北秦皇岛一中在线课程自动签到
一个简单的Python+Selenium程序，用来实现在秦皇岛一中的网课平台school.etiantian.com自动签到
## 使用说明
### 组成  
**get_cookies.py** —— 获取网站自动登录cookies  
**excute_signin.py** —— 带有图形界面的程序  
**excute_signin_CLI.py** —— 以命令行方式运行的程序  
**cookies.txt** —— 用来储存cookies信息   
  
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
#### 1.原理
鉴于学校统计学生是否上课的标准是某个课程在平台内是否显示为“完成”状态，因此我们只需模拟点击一次当日课程的直播间，使其变为“完成”状态即可。  
由于school.etiantian.com使用了大量的css伪元素，很难利用xpath或者css selector进行元素定位，因此采取的是比较低级的ActionChains模拟鼠标点击方式来实现相关功能，若有更好的方法欢迎提供~  
  
#### 2.测量坐标  
由于每台电脑的分辨率和显示比例并不一致，因此我们需要先确定各个按钮所在的位置，即对程序进行初始化。   
之前已经安装了Chrome浏览器，我们需要它的一个名为"Page Ruler Redux"的插件来测量坐标，可以自行搜索或是前往Chrome网上应用店下载（后者可能需要科学上网工具）。  
![ruler.gif](https://i.loli.net/2020/04/10/iAdIauV8rJPKMH4.gif)  
如图，首先进入本次要测量的学科，点击右上角工具栏的Page Ruler Redux图标，先点击这个学科的按钮，然后再点击本学科最后一个直播间  
![TIM图片20200410165121.png](https://i.loli.net/2020/04/10/WJ6ihsZ9LyXkCHv.png)  
网页的坐标系如图所示，因此顶栏中Left的数据记为x，Top的数据记为y  
先记录下学科按钮的坐标值，再测量本学科最后一个直播间的坐标值，最后计算第二次测量的结果相对于第一次测量结果的值（即一第一次测量的位置为原点，反方向即加负号）保留数据备用。  
  
**举例**  
在我的电脑上，点击“生物”学科的按钮，上方显示Left:870 Top:175，因此记作坐标(170, 875)，而生物最后一个直播间的坐标为(620, 315)，取第二组对于第一组的相对值，得到(-250, 140)，记作“生物 (170, 875) (-250, 140)”备用，用同样的方法对测量六科的数据，最后应该得到每科两组，共12组有序数对。  
  
#### 3.获取自动登录网课平台的Cookies  
上述准备工作完成后，我们要获取一下网站自动登录所要用的cookies，并将其保存在本地以供调用。  
运行get_cookies.py，在打开的页面中输入用户名和密码，并选择"记住密码"，点击登录，登录成功后会跳转到学生首页。
在学生首页不要进行任何操作，等待页面自动关闭。  
请在20s内完成上述操作，如果密码输入错误或输入速度过慢，亦或出现其他问题，请删除cookies.txt后重新运行get_cookies.py进行相关操作。  
若操作无误，同目录下cookies.txt应生成一段json信息。
  
#### 4.编写启动脚本  
编写bat脚本`"python ./excute_signin.py x1 y1 x2 y2"`  
传入的四个参数是什么呢，还记得之前记录的坐标么？这便是我们需要的四个参数。  
设定之后尝试双击运行bat文件，如果进入了目标学科的页面，随后自动点击最新的直播间，打开直播间后自动关闭窗口，即配置成功。  
  
**举例：**  
记录了“生物 (170, 875) (-250, 140)”，新建biology.bat，内容为  
`"python ./excute_signin.py 170 875 -250 140"`  
以此类推  
  
**注意**  
这里执行的是excute_signin.py，因此模拟操作时会出现浏览器的图形界面，如果想让操作在后台运行，可以使用命令行版本，即将"excute_signin.py"替换为"excute_signin_CLI.py"，其他操作不变。
  
#### 5.配置定时自动操作  
使用Windows计划任务即可  
见百度经验：https://jingyan.baidu.com/article/0964eca2cb8c17c284f53670.html  
e.g.  
按照说明创建biology.bat后在计划任务中添加每天16:00执行，即可实现每日16：00自动签到。  
  
**注意**  
bat文件要以英文数字命名，否则计划任务很可能无法执行  
