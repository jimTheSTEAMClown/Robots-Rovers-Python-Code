#!/bin/bash

OUTPUT="/var/www/html/pi_web_php_status.txt"

# Timestamp
echo "timestamp=$(date '+%Y-%m-%d %H:%M:%S')" > $OUTPUT

# IP Addresses
echo "ip_wlan=$(hostname -I | awk '{print $1}')" >> $OUTPUT
echo "ip_eth=$(ip addr show eth0 2>/dev/null | grep 'inet ' | awk '{print $2}' | cut -d/ -f1)" >> $OUTPUT
echo "hostname=$(hostname)" >> $OUTPUT

# CPU
echo "cpu_temp=$(vcgencmd measure_temp | cut -d= -f2)" >> $OUTPUT
echo "cpu_usage=$(top -bn1 | grep 'Cpu(s)' | awk '{print $2}' | cut -d. -f1)%" >> $OUTPUT

# Memory
echo "mem_total=$(free -m | awk '/Mem:/ {print $2}') MB" >> $OUTPUT
echo "mem_used=$(free -m | awk '/Mem:/ {print $3}') MB" >> $OUTPUT
echo "mem_free=$(free -m | awk '/Mem:/ {print $4}') MB" >> $OUTPUT

# Disk
echo "disk_total=$(df -h / | awk 'NR==2 {print $2}')" >> $OUTPUT
echo "disk_used=$(df -h / | awk 'NR==2 {print $3}')" >> $OUTPUT
echo "disk_free=$(df -h / | awk 'NR==2 {print $4}')" >> $OUTPUT
echo "disk_percent=$(df -h / | awk 'NR==2 {print $5}')" >> $OUTPUT

# Uptime
echo "uptime=$(uptime -p)" >> $OUTPUT
