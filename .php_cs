<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('bootstrap/*')
    ->notPath('storage/*')
    ->notPath('resources/view/mail/*')
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'                               => true,
        'no_useless_else'                     => true,
        'array_indentation'                   => true,
        'no_unused_imports'                   => true,
        'no_useless_return'                   => true,
        'short_scalar_cast'                   => true,
        'switch_case_space'                   => true,
        'trim_array_spaces'                   => true,
        'normalize_index_brace'               => true,
        'unary_operator_spaces'               => true,
        'no_leading_import_slash'             => true,
        'ternary_operator_spaces'             => true,
        'compact_nullable_typehint'           => true,
        'single_line_after_imports'           => true,
        'lowercase_static_reference'          => true,
        'ternary_to_null_coalescing'          => true,
        'linebreak_after_opening_tag'         => true,
        'no_whitespace_in_blank_line'         => true,
        'single_import_per_statement'         => true,
        'concat_space'                        => ['spacing' => 'one'],
        'array_syntax'                        => ['syntax' => 'short'],
        'declare_equal_normalize'             => ['space' => 'single'],
        'switch_case_semicolon_to_colon'      => true,
        'no_leading_namespace_whitespace'     => true,
        'whitespace_after_comma_in_array'     => true,
        'single_trait_insert_per_statement'   => true,
        'trailing_comma_in_multiline_array'   => true,
        'no_blank_lines_after_class_opening'  => true,
        'single_blank_line_before_namespace'  => true,
        'no_whitespace_before_comma_in_array' => true,
        'ordered_imports'                     => ['sortAlgorithm' => 'length'],
        'binary_operator_spaces'              => ['default' => 'align_single_space_minimal'],
        'visibility_required'                 => ['elements' => ['property', 'method']],
        'single_quote'                        => ['strings_containing_single_quote_chars' => false],
        'single_class_element_per_statement'  => ['elements' => ['const', 'property']],
        'class_attributes_separation'         => ['elements' => ['const', 'method', 'property']],
        'no_extra_blank_lines'                => [
            'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block',
            'return', 'square_brace_block', 'switch', 'throw', 'use', 'useTrait', 'use_trait',
        ],
        'no_extra_consecutive_blank_lines' => [
            'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block',
            'return', 'square_brace_block', 'switch', 'throw', 'use', 'useTrait', 'use_trait',
        ],
        'ordered_class_elements' => [
            'order' => [
                'use_trait', 'constant_public', 'constant_protected', 'constant_private', 'property_public', 'property_protected',
                'property_private', 'construct', 'destruct', 'magic', 'phpunit', 'method_protected', 'method_public', 'method_private',
            ],
            'sortAlgorithm' => 'alpha',
        ],
    ])
    ->setFinder($finder);
