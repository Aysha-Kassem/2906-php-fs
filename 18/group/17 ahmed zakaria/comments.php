<?php
require_once 'load.php';


$post_id = $_GET['post_id'] ?? null;

if (!$post_id)
    header('Location: /')

        ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTS</title>
    <style>
    .parent {
      display: flex;
      perspective: 1000px;
      padding: 20px 50px;
      flex-wrap: wrap;
      width: 320px;

    }


    /* From Uiverse.io by Smit-Prajapati */
    body {
      display: flex;
      flex-wrap: wrap;
    }

    .parent {
      perspective: 1000px;
      padding: 20px 50px;
      width: 420px;
    }

    .card {
      width: 420px;
      height: 480px;
      border-radius: 50px;
      background: linear-gradient(135deg, rgb(0, 255, 214) 0%, rgb(8, 226, 96) 100%);
      transition: all 0.5s ease-in-out;
      transform-style: preserve-3d;
      box-shadow: rgba(5, 71, 17, 0) 40px 50px 25px -40px, rgba(5, 71, 17, 0.2) 0px 25px 25px -5px;
    }

    .flex {
      display: flex;
      justify-content: space-between;
      gap: 20px;

      height: 60px;
    }

    .flex div {
      width: 150px;
      /* height:40px; */
    }

    .glass {
      transform-style: preserve-3d;
      position: absolute;
      inset: 8px;
      border-radius: 55px;
      border-top-right-radius: 100%;
      background: linear-gradient(0deg, rgba(255, 255, 255, 0.349) 0%, rgba(255, 255, 255, 0.815) 100%);
      /* -webkit-backdrop-filter: blur(5px);
                                         backdrop-filter: blur(5px); */
      transform: translate3d(0px, 0px, 25px);
      border-left: 1px solid white;
      border-bottom: 1px solid white;
      transition: all 0.5s ease-in-out;
    }

    .content {
      padding: 35px 60px 0px 30px;
      transform: translate3d(0, 0, 26px);
    }

    .content .title {
      display: block;
      color: #00894d;
      font-weight: 900;
      font-size: 20px;
    }

    .content .text {
      display: block;
      color: rgba(0, 137, 78, 0.7647058824);
      font-size: 15px;
      /* margin-top: 20px; */
      height: 100px;
      overflow: auto;
      /* padding-bottom: 10px; */
    }

    .content .post_editor {
      display: block;
      color: rgba(25, 49, 39, 0.77);
      font-size: 12px;
      /* margin-top: 20px; */
      overflow: auto;
      /* padding-bottom: 10px; */

    }

    .content .post_editor span {
      font-size: 17px;
      color: darkgreen;

    }

    .content .post_editor button {
      opacity: 0.5;
      border: none;
      padding: 5px;
    }

    .reactions {
      font-size: 10px;
      padding: 5px;
      display: flex;
      gap: 9px;
    }

    .bottom {
      padding: 10px 12px;
      transform-style: preserve-3d;
      position: absolute;
      bottom: 20px;
      left: 20px;
      right: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transform: translate3d(0, 0, 26px);
    }

    .bottom .view-more {
      display: flex;
      align-items: center;
      width: 40%;
      justify-content: flex-end;
      transition: all 0.2s ease-in-out;
    }

    .bottom .view-more:hover {
      transform: translate3d(0, 0, 10px);
    }

    .bottom .view-more .view-more-button {
      background: none;
      border: none;
      color: #00c37b;
      font-weight: bolder;
      font-size: 12px;
    }

    .bottom .view-more .svg {
      fill: none;
      stroke: #00c37b;
      stroke-width: 3px;
      max-height: 15px;
    }

    .bottom .social-buttons-container {
      display: flex;
      gap: 10px;
      transform-style: preserve-3d;
    }

    .bottom .social-buttons-container .social-button {
      width: 30px;
      aspect-ratio: 1;
      padding: 5px;
      background: rgb(255, 255, 255);
      border-radius: 50%;
      border: none;
      display: grid;
      place-content: center;
      box-shadow: rgba(5, 71, 17, 0.5) 0px 7px 5px -5px;
    }

    .bottom .social-buttons-container .social-button:first-child {
      transition: transform 0.2s ease-in-out 0.4s, box-shadow 0.2s ease-in-out 0.4s;
    }

    .bottom .social-buttons-container .social-button:nth-child(2) {
      transition: transform 0.2s ease-in-out 0.6s, box-shadow 0.2s ease-in-out 0.6s;
    }

    .bottom .social-buttons-container .social-button:nth-child(3) {
      transition: transform 0.2s ease-in-out 0.8s, box-shadow 0.2s ease-in-out 0.8s;
    }

    .bottom .social-buttons-container .social-button .svg {
      width: 15px;
      fill: #00894d;
    }

    .bottom .social-buttons-container .social-button:hover {
      background: black;
    }

    .bottom .social-buttons-container .social-button:hover .svg {
      fill: white;
    }

    .bottom .social-buttons-container .social-button:active {
      background: rgb(255, 234, 0);
    }

    .bottom .social-buttons-container .social-button:active .svg {
      fill: black;
    }

    .logo {
      position: absolute;
      right: 0;
      top: 0;
      transform-style: preserve-3d;
    }

    .logo .circle {
      display: block;
      position: absolute;
      aspect-ratio: 1;
      border-radius: 50%;
      top: 0;
      right: 0;
      box-shadow: rgba(100, 100, 111, 0.2) -10px 10px 20px 0px;
      -webkit-backdrop-filter: blur(5px);
      backdrop-filter: blur(5px);
      background: rgba(0, 249, 203, 0.2);
      transition: all 0.5s ease-in-out;
    }

    .logo .circle1 {
      width: 170px;
      transform: translate3d(0, 0, 20px);
      top: 8px;
      right: 8px;
    }

    .logo .circle2 {
      width: 140px;
      transform: translate3d(0, 0, 40px);
      top: 10px;
      right: 10px;
      -webkit-backdrop-filter: blur(1px);
      backdrop-filter: blur(1px);
      transition-delay: 0.4s;
    }

    .logo .circle3 {
      width: 110px;
      transform: translate3d(0, 0, 60px);
      top: 17px;
      right: 17px;
      transition-delay: 0.8s;
    }

    .logo .circle4 {
      width: 80px;
      transform: translate3d(0, 0, 80px);
      top: 23px;
      right: 23px;
      transition-delay: 1.2s;
    }

    .logo .circle5 {
      width: 50px;
      transform: translate3d(0, 0, 10px);
      top: 20px;
      right: 20px;
      display: grid;
      place-content: center;
      transition-delay: 1.6s;
    }

    .logo .circle5 .svg {
      width: 20px;
      fill: white;
    }

    /* .parent:hover .card {
                                        transform: rotate3d(1, 1, 0, 30deg);
                                        box-shadow: rgba(5, 71, 17, 0.3) 30px 50px 25px -40px, rgba(5, 71, 17, 0.1) 0px 25px 30px 0px;
                                    } */

    .parent:hover .card .bottom .social-buttons-container .social-button {
      transform: translate3d(0, 0, 50px);
      box-shadow: rgba(5, 71, 17, 0.2) -5px 20px 10px 0px;
    }

    .parent:hover .card .logo .circle2 {
      transform: translate3d(0, 0, 60px);
    }

    .parent:hover .card .logo .circle3 {
      transform: translate3d(0, 0, 80px);
    }

    .parent:hover .card .logo .circle4 {
      transform: translate3d(0, 0, 100px);
    }

    .parent:hover .card .logo .circle5 {
      transform: translate3d(0, 0, 60px);
    }

    * {
      margin: 0;
      padding: 0;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    a {
      color: #03658c;
      text-decoration: none;
    }

    ul {
      list-style-type: none;
    }

    body {
      font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
      background: #dee1e3;
    }

    .comments-container {
      margin: 60px auto 15px;
      width: 768px;
    }

    .comments-container h1 {
      font-size: 36px;
      color: #283035;
      font-weight: 400;
    }

    .comments-container h1 a {
      font-size: 18px;
      font-weight: 700;
    }

    .comments-list {
      margin-top: 30px;
      position: relative;
    }

    .comments-list:before {
      content: '';
      width: 2px;
      height: 100%;
      background: #c7cacb;
      position: absolute;
      left: 32px;
      top: 0;
    }

    .comments-list:after {
      content: '';
      position: absolute;
      background: #c7cacb;
      bottom: 0;
      left: 27px;
      width: 7px;
      height: 7px;
      border: 3px solid #dee1e3;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      border-radius: 50%;
    }

    .reply-list:before,
    .reply-list:after {
      display: none;
    }

    .reply-list li:before {
      content: '';
      width: 60px;
      height: 2px;
      background: #c7cacb;
      position: absolute;
      top: 25px;
      left: -55px;
    }


    .comments-list li {
      margin-bottom: 15px;
      display: block;
      position: relative;
    }

    .comments-list li:after {
      content: '';
      display: block;
      clear: both;
      height: 0;
      width: 0;
    }

    .reply-list {
      padding-left: 88px;
      clear: both;
      margin-top: 15px;
    }

    .comments-list .comment-avatar {
      width: 65px;
      height: 65px;
      position: relative;
      z-index: 99;
      float: left;
      border: 3px solid #FFF;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
      -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    .comments-list .comment-avatar img {
      width: 100%;
      height: 100%;
    }

    .reply-list .comment-avatar {
      width: 50px;
      height: 50px;
    }

    .comment-main-level:after {
      content: '';
      width: 0;
      height: 0;
      display: block;
      clear: both;
    }

    .comments-list .comment-box {
      width: 680px;
      float: right;
      position: relative;
      -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
      -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    }

    .comments-list .comment-box:before,
    .comments-list .comment-box:after {
      content: '';
      height: 0;
      width: 0;
      position: absolute;
      display: block;
      border-width: 10px 12px 10px 0;
      border-style: solid;
      border-color: transparent #FCFCFC;
      top: 8px;
      left: -11px;
    }

    .comments-list .comment-box:before {
      border-width: 11px 13px 11px 0;
      border-color: transparent rgba(0, 0, 0, 0.05);
      left: -12px;
    }

    .reply-list .comment-box {
      width: 610px;
    }

    .comment-box .comment-head {
      background: #FCFCFC;
      padding: 10px 12px;
      border-bottom: 1px solid #E5E5E5;
      overflow: hidden;
      -webkit-border-radius: 4px 4px 0 0;
      -moz-border-radius: 4px 4px 0 0;
      border-radius: 4px 4px 0 0;
    }

    .comment-box .comment-head i {
      float: right;
      margin-left: 14px;
      position: relative;
      top: 2px;
      color: #A6A6A6;
      cursor: pointer;
      -webkit-transition: color 0.3s ease;
      -o-transition: color 0.3s ease;
      transition: color 0.3s ease;
    }

    .comment-box .comment-head i:hover {
      color: #03658c;
    }

    .comment-box .comment-name {
      color: #283035;
      font-size: 14px;
      font-weight: 700;
      float: left;
      margin-right: 10px;
    }

    .comment-box .comment-name a {
      color: #283035;
    }

    .comment-box .comment-head span {
      float: left;
      color: #999;
      font-size: 13px;
      position: relative;
      top: 1px;
    }

    .comment-box .comment-content {
      background: #FFF;
      padding: 12px;
      font-size: 15px;
      color: #595959;
      -webkit-border-radius: 0 0 4px 4px;
      -moz-border-radius: 0 0 4px 4px;
      border-radius: 0 0 4px 4px;
    }

    .comment-box .comment-name.by-author,
    .comment-box .comment-name.by-author a {
      color: #03658c;
    }

    .comment-box .comment-name.by-author:after {
      content: 'autor';
      background: #03658c;
      color: #FFF;
      font-size: 12px;
      padding: 3px 5px;
      font-weight: 700;
      margin-left: 10px;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
    }

    /** =====================
        * Responsive
        ========================*/
    @media only screen and (max-width: 766px) {
      .comments-container {
        width: 480px;
      }

      .comments-list .comment-box {
        width: 390px;
      }

      .reply-list .comment-box {
        width: 320px;
      }
    }

    </style>
  </head>

  <body class="">
    <h1>Comments</h1>

    <?php
$comments = Comment::show($post_id);
foreach ($comments as $comment) {
    $replies = Replay::all($comments['id']);
    require 'components/comments/card.php';

    }
?>

  </body>

</html>
