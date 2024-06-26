<?php

namespace Modules\Notification\Repositories;

use Modules\Core\Repositories\BaseRepository;

/**
 * Interface NotificationRepository
 */
interface NotificationRepository extends BaseRepository
{
    /**
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function latestForUser($userId);

    /**
     * Mark the given notification id as "read"
     *
     * @param  int  $notificationId
     * @return bool
     */
    public function markNotificationAsRead($notificationId);

    /**
     * Get all the notifications for the given user id
     *
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId);

    /**
     * Get all the unread notifications for the given user id
     *
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allUnreadForUser($userId);

    /**
     * Get all the read notifications for the given user id
     *
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allReadForUser($userId);

    /**
     * Delete all the notifications for the given user
     *
     * @param  int  $userId
     * @return bool
     */
    public function deleteAllForUser($userId);

    /**
     * Mark all the notifications for the given user as read
     *
     * @param  int  $userId
     * @return bool
     */
    public function markAllAsReadForUser($userId);

    /**
     * Get all the read notifications for the given filters
     *
     * @param  array  $params
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getItemsBy($params);

    /**
     * Get the read notification for the given filters
     *
     * @param  string  $criteria
     * @param  array  $params
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getItem($criteria, $params = false);

    /**
     * Update the notifications for the given ids
     *
     * @param  array  $criterias
     * @param  array  $data
     * @return bool
     */
    public function updateItems($criterias, $data);

    /**
     * Delete the notifications for the given ids
     *
     * @param  array  $criterias
     * @return bool
     */
    public function deleteItems($criterias);
}
