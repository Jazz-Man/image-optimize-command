<?php

declare(strict_types=1);

namespace TypistTech\ImageOptimizeCommand\CLI\Commands;

use WP_CLI\Dispatcher\CommandNamespace as BaseCommandNamespace;

/**
 * Optimize images.
 *
 * ## EXAMPLES
 *
 *     # Optimize specific attachments
 *     $ wp image-optimize attachment 123 223 323
 *
 *     # Optimize certain number of non-optimized attachments
 *     $ wp image-optimize batch --limit=20
 *
 *     # Restore the full sized images of specific attachments.
 *     $ wp image-optimize restore 123 223 323
 */
class CommandNamespace extends BaseCommandNamespace
{
}
