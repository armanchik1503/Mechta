<?php

namespace src;

class Renderer
{
    public function render_search_result($row)
    {
        echo "<div>Result: " . htmlspecialchars($row['text']) . "</div>";
    }
}
