<?php
/**
 * Dragonet options to automatic cleanup failed InfiniteWP backups
 *
 * With a cron script all the temp backup items will be removed
 * from the infinitewp/backups folder
 * Backups are send to Dropbox so it's not necessary to keep them
 * on the server.
 */

//namespace library;

class DGinfiniteWP
{
    private $removeTemp   = true;
    private $removeBackup = true;

    public function __construct()
    {
        add_action('dg_infinitewp_cleanup', [$this, 'cleanup']);

        if (!wp_next_scheduled('dg_infinitewp_cleanup')) {
            wp_schedule_event(strtotime('2025-02-02 22:00:00'), 'daily', 'dg_infinitewp_cleanup');
        }
    }

    /**
     * Remove backup temp files
     *
     * @return bool
     */
    public function cleanup(): bool
    {
        $infiniteDir = WP_CONTENT_DIR . '/infinitewp/backups';
        if (!file_exists($infiniteDir)) {
            return false;
        }

        $pattern = $this->pattern();
        $scanDir = scandir($infiniteDir);
        foreach ($scanDir as $file) {
            preg_match($pattern, $file, $matches, PREG_UNMATCHED_AS_NULL);

            if (empty($matches)) {
                continue;
            }

            $this->log($file);
            $file = $infiniteDir . '/' . $file;
            unlink($file);
        }

        return true;
    }

    /**
     * Get the needed pattern for this cleanup
     *
     * @return string
     */
    private function pattern(): string
    {
        $pattern = [];
        if ($this->removeTemp) {
            $pattern = array_merge($pattern, ['DE_cl', '.tmp', '-db.gz']);
        }
        if ($this->removeBackup) {
            $pattern = array_merge($pattern, ['.zip']);
        }
        return '/(' . implode('|', $pattern) . ')/';
    }

    /**
     * log the result in a file
     *
     * @param string $file
     * @return bool
     */
    private function log(string $file = ''): bool
    {
        $logfile = WP_CONTENT_DIR . '/infinitewp/cleanup_' . date('Ym') . '.log';
        if (!file_exists($logfile)) {
            $createdLog = fopen($logfile, "a+");
            fclose($createdLog);
        }


        $output = date('Y-m-d H:i:s') . ' Removed: ' . $file . "\n";

        error_log(
            $output,
            3,
            $logfile
        );

        return true;
    }
}
