<?php
/**
 * Copyright (c) 2019 Lumin Sports Technology - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential.
 */

$finder = PhpCsFixer\Finder::create()
    ->in(array_values(array_filter([
        __DIR__ . '/app',
        __DIR__ . '/src',
        __DIR__ . '/tests'
    ], 'is_dir')))
    ->notName('*.blade.php')
    ->name('*.php');

$config = new PhpCsFixer\Config;

$config->setRules([
    '@Symfony'                              => true,
    'array_syntax'                          => ['syntax' => 'short'],
    'increment_style'                       => ['style' => 'post'],
    'array_indentation'                     => true,
    'binary_operator_spaces'                => [
        'operators' => [
            '=>' => 'align',
        ],
    ],
    'ordered_class_elements'                => [
        'order' => [
            'use_trait',
            'case',
            'property_public',
            'property_protected',
            'property_private',
            'property_public_static',
            'property_protected_static',
            'property_private_static',
            'constant_public',
            'constant_protected',
            'constant_private',
            'construct',
            'phpunit',
            'method_public',
            'method_protected',
            'method_private',
            'method_public_abstract',
            'method_protected_abstract',
            'method_private_abstract',
            'destruct',
            'magic',
            'phpunit'
        ],
    ],
    'blank_line_before_statement'           => true,
    'concat_space'                          => ['spacing' => 'one'],
    'linebreak_after_opening_tag'           => true,
    'no_php4_constructor'                   => true,
    'no_unreachable_default_argument_value' => true,
    'no_alias_functions'                    => true,
    'no_extra_blank_lines'                  => true,
    'echo_tag_syntax'                       => ['format' => 'long'],
    'no_useless_else'                       => true,
    'no_useless_return'                     => true,
    'no_trailing_whitespace'                => true,
    'not_operator_with_successor_space'     => true,
    'fully_qualified_strict_types'          => true,
    'ordered_imports'                       => true,
    'self_accessor'                         => true,
    'phpdoc_order'                          => true,
    'phpdoc_align'                          => ['tags' => ['param', 'property', 'property-read', 'property-write', 'return', 'throws', 'var', 'method'], 'align' => 'vertical'],
    'simplified_null_return'                => true,
    'new_with_braces'                       => false,
    'single_trait_insert_per_statement'     => false,
    'single_line_empty_body'                => true,
    'yoda_style'                            => false,
    'php_unit_method_casing'                => ['case' => 'snake_case'],
    'phpdoc_no_alias_tag'                   => ['replacements' => ['type' => 'var', 'link' => 'see']],

    'nullable_type_declaration_for_default_null_value' => true,
    'new_with_parentheses' => ['named_class' => false, 'anonymous_class' => false],
]);

return $config->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setUsingCache(true);
