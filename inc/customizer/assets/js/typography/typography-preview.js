jQuery( document ).ready( function() {

	/* === <p> === */

	wp.customize(
		'p_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite p' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'p_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite p' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'p_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite p' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'p_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite p' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'p_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite p' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);

    wp.customize(
        'p_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite p' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

	/* === <h1> === */

	wp.customize(
		'h1_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h1' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h1_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h1' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'h1_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h1' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'h1_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h1' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h1_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h1' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);

    wp.customize(
        'h1_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite h1' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

	/* === <h2> === */

	wp.customize(
		'h2_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h2' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h2_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h2' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'h2_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h2' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'h2_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h2' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h2_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h2' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);

    wp.customize(
        'h2_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite h2' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

	/* === <h3> === */

	wp.customize(
		'h3_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h3' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h3_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h3' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'h3_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h3' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'h3_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h3' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h3_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h3' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);

    wp.customize(
        'h3_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite h3' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

	/* === <h4> === */

	wp.customize(
		'h4_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h4' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h4_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h4' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'h4_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h4' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'h4_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h4' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h4_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h4' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);
    wp.customize(
        'h4_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite h4' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

	/* === <h5> === */

	wp.customize(
		'h5_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h5' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h5_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h5' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'h5_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h5' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'h5_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h5' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h5_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h5' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);


    wp.customize(
        'h5_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite h5' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

	/* === <h6> === */

	wp.customize(
		'h6_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h6' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h6_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h6' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'h6_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h6' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'h6_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h6' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h6_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite h6' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);

    wp.customize(
        'h6_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite h6' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );


	/* === Menu === */

	wp.customize(
		'menu_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite #rl-main-menu ul.nav-menu li a' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'menu_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite #rl-main-menu ul.nav-menu li a' ).css( 'font-weight', to );
				}
			);
		}
	);

	wp.customize(
		'menu_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite #rl-main-menu ul.nav-menu li a' ).css( 'font-style', to );
				}
			);
		}
	);

	wp.customize(
		'menu_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite #rl-main-menu ul.nav-menu li a' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'menu_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'body.riba-lite #rl-main-menu ul.nav-menu li a' ).css( 'line-height', to + 'px' );
				}
			);
		}
	);

    wp.customize(
        'menu_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite #rl-main-menu ul.nav-menu li a' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

    /* === Logo === */

    wp.customize(
        'logo_font_family',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite .rl-text-logo' ).css( 'font-family', to );
                }
            );
        }
    );

    wp.customize(
        'logo_font_weight',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite .rl-text-logo' ).css( 'font-weight', to );
                }
            );
        }
    );

    wp.customize(
        'logo_font_style',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite .rl-text-logo' ).css( 'font-style', to );
                }
            );
        }
    );

    wp.customize(
        'logo_font_size',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite .rl-text-logo' ).css( 'font-size', to + 'px' );
                }
            );
        }
    );

    wp.customize(
        'logo_line_height',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite .rl-text-logo' ).css( 'line-height', to + 'px' );
                }
            );
        }
    );

    wp.customize(
        'logo_letter_spacing',
        function( value ) {
            value.bind(
                function( to ) {
                    jQuery( 'body.riba-lite .rl-text-logo' ).css( 'letter-spacing', to + 'px' );
                }
            );
        }
    );

} ); // jQuery( document ).ready