<h1>Reviews</h1>
<form method="post" id="review" action="queries/review-query.php">
    <section class="reviews">
        <?php
        if (isset($_SESSION['isLogged'])) {
            if ($_SESSION['isLogged']) {
                $username = $_SESSION['username'];
                $initials = substr($username, 0, 2);
                echo '
                        <div class="write">
                            <div class="rating">
                                <div class="info-review">
                                    <div class="img one">' . $initials . '</div>
                                    <p style="color: #2F3D7E; font-size: larger; margin: 0">' . $username . '</p>
                                </div>
                                <div id="full-stars">
                                    <div class="rating-group">
                                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                                    </div>
                                </div>
                            </div>
                            <div class="comment-div">
                                <textarea maxlength="255" name="comment" class="comment"></textarea>
                                <div class="submit-comment">
                                    <input type="submit" value="Comment">
                                </div>
                            </div>
                        </div>
                    ';
            }
        } else {
            echo "<h2 style='text-align: center'>Login to post a review</h2>";
        }
        ?>
    </section>
</form>
<br><br>
<section class="display-reviews">
    <?php
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
    $query = "SELECT * FROM reviews ORDER BY RAND() LIMIT 4";
    $request = mysqli_query($connection, $query);

    if ($request->num_rows > 0) {
        $reviewIndex = 1; // Initialize a review index variable

        while ($row = mysqli_fetch_assoc($request)) {
            $query2 = "SELECT username FROM user WHERE id=\"" . $row['user_id'] . "\"";
            $request2 = mysqli_query($connection, $query2);
            $row2 = mysqli_fetch_assoc($request2);
            $username = $row2['username'];
            $initials = substr($username, 0, 2);
            $comment = $row['comment'];

            echo "
            <article class='review'>
                <div class='upper'>
                    <div class='username-review'>
                        <div class='img one'>$initials</div>
                        <h3>$username</h3>
                    </div>
                    <div class='stars' id='full-stars-$reviewIndex'>
                        <div class='rating-group' id='display-stars-$reviewIndex'>
                ";
                $rating = $row['rating'];
                for ($i = 1; $i <= 5; $i++) {
                    $checked = ($i <= $rating) ? 'checked' : '';
                    echo "
                                <label style='cursor: default' aria-label='$i star' class='rating__label' for='rating3-$reviewIndex-$i'><i class='rating__icon fa fa-star disable-hover'></i></label>
                                <input class='rating__input' $checked name='rating3-$reviewIndex' id='rating3-$reviewIndex-$i' value='$i' type='radio'>
                            ";
                }
                echo "
                        </div>
                    </div>
                </div>
                <div class='lower'>
                    <p class='comment-displayed'>$comment</p>
                </div>   
            </article>
            ";

            $reviewIndex++; // Increment the review index
        }
    }
    ?>
</section>
