# Magento 2 Admin Order Status Color in Order Grid
Magento2 extension to changes the color of the order status column in the UI grid, based on the current status of the order. 

## Features:
1. To changes the color of the order status column in the UI grid, based on the current status of the order.
2. Magento2 extension works like a core functionality.

## Installation

### Type 1: Zip file

 - Unzip the zip file in `app/code/Nadeem`
 - Enable the module by running `php bin/magento module:enable Nadeem_OrderStatusColor`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

# Contribution

Want to contribute to this extension? The quickest way is to <a href="https://help.github.com/articles/about-pull-requests/">open a pull request</a> on GitHub.

# Screenshots & Support
If you encounter any problems or bugs, please <a href="https://github.com/inadeemkhan/magento2-admin-order-status-in-color/issues">open an issue</a> on GitHub.

<b>Admin Grid</b>
![ScreenShot](https://github.com/inadeemkhan/magento2-images/blob/master/order-status.png)

## Prerequisites

### Use the following table to verify you have the correct prerequisites to install this Extension.
<table>
	<tbody>
		<tr>
			<th>Prerequisite</th>
			<th>How to check</th>
			<th>For more information</th>
		</tr>
	<tr>
		<td>Apache 2.2 or 2.4</td>
		<td>Ubuntu: <code>apache2 -v</code><br>
		CentOS: <code>httpd -v</code></td>
		<td><a href="https://devdocs.magento.com/guides/v2.2/install-gde/prereq/apache.html">Apache</a></td>
	</tr>
	<tr>
		<td>PHP 7.*.*</td>
		<td><code>php -v</code></td>
		<td><a href="http://devdocs.magento.com/guides/v2.2/install-gde/prereq/php-ubuntu.html">PHP Ubuntu</a><br><a href="http://devdocs.magento.com/guides/v2.2/install-gde/prereq/php-centos.html">PHP CentOS</a></td>
	</tr>
	<tr><td>MySQL 5.6.x</td>
	<td><code>mysql -u [root user name] -p</code></td>
	<td><a href="http://devdocs.magento.com/guides/v2.2/install-gde/prereq/mysql.html">MySQL</a></td>
	</tr>
</tbody>
</table>

### Feedback and Support 

<a href="mailto:khannadeem243@gmail.com">khannadeem243@gmail.com</a>
