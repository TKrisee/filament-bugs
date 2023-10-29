<?php

declare(strict_types=1);


$finder = PhpCsFixer\Finder::create()
    ->exclude('bootstrap')
    ->exclude('storage')
    ->in(__DIR__)
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return $config = (new PhpCsFixer\Config())
    ->setUsingCache(false)
    ->setIndent("\t")
    ->setLineEnding("\n")
    ->setRules([
        '@Symfony' => true,

        'array_indentation' => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => [],
        ],
        'combine_consecutive_unsets' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'class_attributes_separation' => [
            'elements' => [
                'method' => 'one',
                'property' => 'one',
            ],
        ],
        'heredoc_indentation' => false,
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
        ],
        'new_with_braces' => true,
        'no_superfluous_elseif' => true,
        'no_superfluous_phpdoc_tags' => true,
        'no_useless_else' => true,
        'not_operator_with_successor_space' => true,
        'operator_linebreak' => [
            'position' => 'beginning',
        ],

        // Messes with complex array shapes
        'phpdoc_align' => false,

        'phpdoc_no_alias_tag' => [
            'replacements' => [
                'type' => 'var',
                'link' => 'see',
            ],
        ],
        'phpdoc_order' => true,

        // Intermediary PHPDocs are sometimes useful to provide type assertions for PHPStan
        'phpdoc_to_comment' => false,

        'single_line_throw' => false,
    ])
    ->setFinder($finder);
    