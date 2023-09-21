<?php
/**
@file     data/PostAccess.php
@author   Florian Lopitaux
@version  0.1
@summary  Class to interact with the Post sql table.

-------------------------------------------------------------------------

Copyright (C) 2023 MindShare-AI

Use of this software is governed by the GNU Public License, version 3.

MindShare-API is free RESTFUL API: you can use it under the terms
of the GNU General Public License as published by the
Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

MindShare-API is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with MindShare-API. If not, see <http://www.gnu.org/licenses/>.

This banner notice must not be removed.

-------------------------------------------------------------------------
 */

namespace data;

require_once 'DataAccess.php';

use model\Post;
require_once 'model/Post.php';

final class PostAccess extends DataAccess {
    // METHODS
    /**
     * Returns all posts registered in the database.
     *
     * @return array The posts.
     */
    public function getAllPosts() : array {
        $posts = array();

        // send sql request
        $this->prepareQuery('SELECT * FROM POST');
        $this->executeQuery(array());

        // get the response
        $result = $this->getQueryResult();

        foreach ($result as $row) {
            $posts[] = new Post($row['id_post'], $row['id_account'],
                $row['message'], $row['send_date'], $row['id_post_commented']);
        }

        return $posts;
    }

    /**
     * Returns all posts sent by a given account.
     *
     * @param int $idAccount The identifier of the account.
     *
     * @return array All posts sent.
     */
    public function getPostsOfAccount(int $idAccount) : array {
        $posts = array();

        // send sql request
        $this->prepareQuery('SELECT * FROM POST WHERE id_account = ?');
        $this->executeQuery(array($idAccount));

        // get the response
        $result = $this->getQueryResult();

        foreach ($result as $row) {
            $posts = new Post($row['id_post'], $row['id_account'],
                $row['message'], $row['send_date'], $row['id_post_commented']);
        }

        return $posts;
    }

    /**
     * Returns all comments of a specified post.
     *
     * @param int $idPost The identifier of the past that we want it comments.
     *
     * @return array The comments of the post.
     */
    public function getCommentsOfPost(int $idPost) : array {
        $comments = array();

        // send sql request
        $this->prepareQuery('SELECT * FROM POST WHERE id_post_commented = ?');
        $this->executeQuery(array($idPost));

        // get the response
        $result = $this->getQueryResult();

        foreach ($result as $row) {
            $comments = new Post($row['id_post'], $row['id_account'],
                $row['message'], $row['send_date'], $row['id_post_commented']);
        }

        return $comments;
    }
}
