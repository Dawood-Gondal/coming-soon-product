# M2Commerce Commerce: Magento 2 Coming Soon Products

## Overview
The extension allow admin to show timer clock on products of his choice to feature them as coming/arriving soon by specifying date and time on product level.
Admin can disable complete functionality from admin configurations as well.

## Configuration
There are several configuration options for this extension, which can be found at **STORES > Configuration > Commerce Enterprise > Coming Soon Products**.

### ScreenShots
![ss-1](Screenshots/ss_1.png)

## Installation
### Magento® Marketplace

This extension will also be available on the Magento® Marketplace when approved.

1. Go to Magento® 2 root folder
2. Require/Download this extension:

   Enter following commands to install extension.

   ```
   composer require m2commerce/coming-soon-product
   ```

   Wait while composer is updated.

   #### OR

   You can also download code from this repo under Magento® 2 following directory:

    ```
    app/code/M2Commerce/ComingSoonProduct
    ```    

3. Enter following commands to enable the module:

   ```
   php bin/magento module:enable M2Commerce_ComingSoonProduct
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

4. If Magento® is running in production mode, deploy static content:

   ```
   php bin/magento setup:static-content:deploy
   ```
