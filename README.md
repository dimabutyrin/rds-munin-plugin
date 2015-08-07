rds-munin-wildcard
================

AWS RDS Wildcard Munin Plugin

## Installation and configuration

- Checkout repository into munin's libdir:  
```bash
cd /usr/share/munin/plugins/ && git clone https://github.com/dimabutyrin/rds-munin-wildcard.git  
```
- Download AWS SDK PHP Phar package into repository root folder:  
```bash
wget http://pear.amazonwebservices.com/get/aws.phar  
```
- Create IAM user in AWS Management Console, write down it's "Access Key ID" and "Secret Access Key"
- Attach CloudWatchReadOnlyAccess policy to the user account created at the previous step
- Change AWS IAM credentials in rds_config.php
- Create symlinks in munin's servicedir directory:
```bash
node=%YOUR-RDS-DB-INSTANCE-ID%  
sudo ln -s /usr/share/munin/plugins/rds-munin-wildcard/rds_conn_ /etc/munin/plugins/rds_conn_$node;  
sudo ln -s /usr/share/munin/plugins/rds-munin-wildcard/rds_mem_ /etc/munin/plugins/rds_mem_$node;  
sudo ln -s /usr/share/munin/plugins/rds-munin-wildcard/rds_cpu_ /etc/munin/plugins/rds_cpu_$node;  
sudo ln -s /usr/share/munin/plugins/rds-munin-wildcard/rds_swap_ /etc/munin/plugins/rds_swap_$node;  
sudo ln -s /usr/share/munin/plugins/rds-munin-wildcard/rds_queue_ /etc/munin/plugins/rds_queue_$node;  
```
- Run this for every node you want to monitor by changing %YOUR-RDS-DB-INSTANCE-ID%
