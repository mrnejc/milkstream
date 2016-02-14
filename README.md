MilkStream
==========

MilkStream is a web-based video streaming solution for GearVR. It creates a video library on your computer. You will be able to browse it from your phone and play videos in MilkVR.

Features
--------
- MilkVR launcher
- `.mvrl` file generator
- One-level subdirectory
- Video search
- Basic HTTP authentication
- Icon for homescreen pinning


Installation
------------
You will need a working HTTP server with PHP support in order to use MilkStream. For Windows users, [XAMPP](https://www.apachefriends.org/index.html) is my recommendation.

The installation basically follows these steps:

**Step 1 :** Install a HTTP server and PHP on your computer. If you decided to use XAMPP, you can see [how to install and run XAMPP here](http://www.wikihow.com/Install-XAMPP-for-Windows). Then, make sure that your HTTP server properly works and can be accessed from your phone. Generally, both computer and phone have to be in the same network.

**Step 2 :** [Download MilkStream](https://github.com/deuteronx/milkstream/archive/master.zip) and extract. Then, rename the folder to `milkstream` and place it inside your server's document root. For XAMPP, this folder is located at `C:\xampp\htdocs`.

**Step 3 :** Open `milkstream\config.php`. Then, enter username, password, and your computer IP address. Here is the example.
```php
<?php
// MilkStream Configuration
$USERNAME = "billy";
$PASSWORD = "sw0rdf1sh123";
$BASE_URL = "http://192.168.5.100/milkstream";
?>
```

**Step 5 :** Create folder `media` inside `milkstream` so that you will have `milkstream\media`.

**Step 6 :** Create new folders inside `milkstream\media` to store your videos. You can name the folders whatever you want.  

**Step 7 :** Put your videos in the subfolders you created in the previous step. DO NOT put any file directly in `milkstream\media` Now your folder structure should look like this.
```
milkstream\media\My Favorite Movies\The Avengers.3dv.mp4
milkstream\media\My Favorite Movies\Iron Man 2.3dv.mp4
milkstream\files\My Home Videos\Billy's Birthday.180x180_3dh.mp4
milkstream\files\My Home Videos\Disney Land HK.180x180_3dh.mp4
```
Please note that the name of your video needs to follow this pattern 
```
VideoTitle.video_type.mp4
```
The `video_type` is supported video format as indicated in https://milkvr.com/#/content/faq. Here is the quick reference.

| Video Type              | Description                     |
|-------------------------|---------------------------------|
| _2dp                    | 2D video                        |
| _3dpv                   | 3D TB video                     |
| _3dph                   | 3D LR video                     |
| 180x180                 | Monoscopic 180                  |
| 180x101                 | Monoscopic 180 16:9             |
| _mono360                | Monoscopic 360                  |
| 3dv                     | TB stereoscopic 3D 360          |
| 3dh                     | LR stereoscopic 3D 360          |
| 180x180_3dv             | TB stereoscopic 3D 180          |
| 180x180_3dh             | LR stereoscopic 3D 180          |
| 180x180_squished_3dh    | LR stereoscopic 3D 180 squished |
| 180x160_3dv             | TB stereoscopic 3D 180x160      |
| 180hemispheres          | Two monoscopic 180 hemispheres  |
| cylinder_slice_2x25_3dv | TB 3D cylinder 2.25:1           |
| cylinder_slice_16x9_3dv | TB 3D cylinder 16:9             |
| sib3d                   | TB 3D 360 no bottom             |
| _planetarium            | 180 planetarium full dome       |
| _v360                   | V360 camera                     |
| _rtxp                   | RTXP 360 cylindrical            |

**Step 8 :** Done!!


Usage
-----
- To use MilkStream, open your web browser on your phone and go to `http://YOUR_COMPUTER_IP_ADDRESS/milkstream`. Enter your configured password and then you are ready to go!

- Choose a video by tapping `Play` button. Then, you will be asked to insert your phone into GearVR.

- You can also use your web browser on your computer to access MilkStream. Clicking `Play` button will play a video on your computer.

- You can download `.mvrl` for each video by tapping `MVRL` button. The downloaded file can be put to `/MilkVR` folder in your phone so that it will appear under *Sideloaded* in MilkVR.

- You can pin MilkStream to your homescreen for easier access.


Note
----
This project was quickly written with the purpose of private use. Due to the technical limitation of MilkVR, the files you added to `milkstream\media` will be accessible by anyone who both *is in the same network with your server* and *knows the url of that file*.

My current advice is to only use MilkStream on private network. It also does not handle any error caused by abnormal use cases. If you want a bit better security, you can try turning off php error reporting and directory listing function in Apache.

Screenshot
----------
![Screenshot](http://i.imgur.com/lUcMVz6.png "MilkStream")

