jQuery(document).ready(function ($) {
  // Listen to wishlist update event
  $(document).on(
    "wce_wishlist_updated",
    function (event, action, product, wishlist) {
      console.log("Action:", action); // "added" or "removed"
      console.log("Product:", product); // Product data
      console.log("Wishlist:", wishlist); // All product IDs
    }
  );
});
