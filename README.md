rds-munin-plugin
================

AWS RDS Munin Plugin

## 使い方

- AWS RDS Munin PluginをMuninが稼働しているサーバの /usr/share/munin/plugins/ に配置します
- AWS SDK PHPのPharパッケージファイルをダウンロードします [download the packaged Phar](http://pear.amazonwebservices.com/get/aws.phar)
- rds_config.phpを開いてAWSの認証キー及び、監視対象RDSのインスタンスIDを記述します