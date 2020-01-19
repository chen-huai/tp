thinkPHP 模板学习
### 删除源码中的已写代码
*有些问题是数据库和软删除导致无法登入*
* 删除admin下的base.php文件
* 修改User.php文件中'class User extends base'->'class User extends Controller'

或者
* 更改数据库中软删除信息（软删除后用户无法登入）
* 模型中user需要双重md5加密同时验证也需要
### MVC思想
业务逻辑，数据，界面分离
* M 模型---数据库
* V 视图---界面
* C 控制器---从视图中读取数据
