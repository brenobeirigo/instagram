<?php
include "./InterfaceInstagramDAO.php";

class InstagramDAO implements InstagramDAO{
    public function createComment($user, $content) {
        
    }

    public function createEffect($effect) {
        
    }

    public function createTagInComment($comment, $user) {
        
    }

    public function createTagInContent($content, $user) {
        
    }

    public function follow($a, $b) {
        
    }

    public function getAllRegisteredUsersBetween($date1, $date2, $offset, $limit) {
        
    }

    public function getAllUsers() {
        
    }

    public function getContentById($content_id) {
        
    }

    public function getContentOfUser($user, $offset, $limit, $type) {
        
    }

    public function getContentUserTagged($user, $offset, $limit, $type) {
        
    }

    public function getFollowersList($user, $offset, $limit) {
        
    }

    public function getFollowingList($user, $offset, $limit) {
        
    }

    public function getListOfCommentators($content, $offset, $limit) {
        
    }

    public function getListOfComments($content, $offset, $limit) {
        
    }

    public function getListOfCommentsByUser($user, $offset, $limit) {
        
    }

    public function getListOfCommmentsUserTagged($user, $offset, $limit) {
        
    }

    public function getListOfContentsUserTagged($user, $offset, $limit) {
        
    }

    public function getListOfEffects() {
        
    }

    public function getListOfLikedContent($user, $type, $offset, $limit) {
        
    }

    public function getListOfUserTaggedInComment($comment, $offset, $limit) {
        
    }

    public function getListOfUserTaggedInContent($content, $offset, $limit) {
        
    }

    public function getListOfUsersLikedComment($comment, $offset, $limit) {
        
    }

    public function getListOfUsersLikedContent($content, $offset, $limit) {
        
    }

    public function getMostFollowedUsers($offset, $limit) {
        
    }

    public function getNumberLikesComment($comment) {
        
    }

    public function getNumberOfCommentators($content) {
        
    }

    public function getNumberOfComments($content) {
        
    }

    public function getNumberOfUsersLikedContent($content) {
        
    }

    public function getQtdCommentsUserTagged() {
        
    }

    public function getQtdContentsUserTagged() {
        
    }

    public function getQtdUserTaggedInComment($comment) {
        
    }

    public function getQtdUserTaggedInContent($content) {
        
    }

    public function getUserById($user_id) {
        
    }

    public function getUsersByName($user_name) {
        
    }

    public function like($user, $content) {
        
    }

    public function removeComment($comment) {
        
    }

    public function removeContent($content) {
        
    }

    public function removeEffect($effect) {
        
    }

    public function removeTagInComment($comment, $user) {
        
    }

    public function removeTagInContent($content, $user) {
        
    }

    public function removeUserById($user_id) {
        
    }

    public function saveContent($content) {
        
    }

    public function saveUser($user) {
        
    }

    public function unfollow($a, $b) {
        
    }

    public function unlike($user, $content) {
        
    }

    public function updateComment($comment) {
        
    }

    public function updateContent($content) {
        
    }

    public function updateEffect($effect) {
        
    }

    public function updateUser($user) {
        
    }

    public function userLikeComment($user, $comment) {
        
    }

    public function userUnlikeComment($user, $comment) {
        
    }

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

