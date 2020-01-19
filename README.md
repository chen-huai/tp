thinkPHP 模板学习
### 删除源码中的已写代码
*有些问题是数据库和软删除导致无法登入*
* 删除admin下的base.php文件
* 修改User.php文件中'class User extends base'->'class User extends Controller'

或者
* 更改数据库中软删除信息（软删除后用户无法登入）
