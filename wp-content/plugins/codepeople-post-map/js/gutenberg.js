( function( blocks, element ) {
	var el 		= element.createElement,
		source	= blocks.source;

	/* Hide the button required by the classic editor */
	jQuery(function(){
		jQuery('#cpm_map_shortcode').hide();
	});

	/* Plugin Category */
	blocks.getCategories().push({slug: 'cpgm', title: 'CP Google Maps'});

	/* ICONS */
	const iconCPGM = el('img', { width: 20, height: 20, src:  "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAiCAYAAABfqvm9AAAABGdBTUEAAK/INwWK6QAAAxFJREFUSMetlktME2EQx5dHBaE8rAgULFBoQRA1QQVBCopQg0ahajSlB0EoEWhpiw8UH0g8kAgioCcvmBhPHo0XD3jwrIlRYmLiRUAjFIOPSEzIjv8pLdIXj5ZJfkmz3+6vOzvfzK4g+I900AiGwSMnD0AzyBLWEFGgB0xFSyRUKE+ikzlZdArsS0km6QYJYW0G9IKYlWRK8Foujaa+gyU00XpWpKtmkW5YyQF+f2mrF4cOaUgRI2Xxe7DNn0wFxrUZCrJbGkXq7iDqaifqbHOny0y8NmtrphqVkqXfQL6nbCN4c1ipoL+dJqJrPkSe4Jx5yHXqTJZ+ALFLhd2pSHPKahRXJVu823aavXBezIyPZWmfSyYHnwcqSx2prFrmAtc8rK5g4ZSzBoI+ShJOE6YGfuhuJ0+21VP3/r2UlyBzwL/5mJsQ19iR2abICJY2sbB/d3KizwKwAOtu8DGvu7xuoTJFCq8PsnDkuFqJbWHzOpHvylPIx7yEN21Ul5fN6yMOYQ0qxQeDERq25ywKB/bIg03ZSuVpqbw+xMI6brFJ87kAi2KiGdtiUYwsTAWT97XlgW0bpDtytJJldme3OeLWVmxsu61Z9Nlufje2mX5ebBFV8XEs7F/aKVIwVotqz/Mw8EjdJ0gVfy46q/sJyDz7OYdT1+eq0acWoium5YUohHFXHsumwU5/E6cA/OgpLcKz6Vi23Yarylg2BzQrzcQzIdgeLw0nFmag15Sx0DujQYwKD2dh62qn9uP8LZtp7nKr6JU6hEcy01k2upbXQAaYvVepce8gPLfnp4+5NnmJsMa4o8Sc+3Op5f9dYgholWkseyYEEArw66mueuFZYn+OGQ0UGhLCQq0QYDxxDA4WIvUeTRHL3gpBhE4WGUnfrUZHuoUpSSy8HYwwgYszqq+laUsTRYSFsbBYCDJe3a0opVG9jmVfQXSwwsGGHbnUe6CYhS+EdQijBu8L/hzxnCiBhjY9LoayZfHk/HgKOgo2hIW6ClK1HkI1EJ3tVrQewkTw2ylUrYcwAnwE4yBupZP/ASesGLIiyjDFAAAAAElFTkSuQmCC" } );

	/* CP Google Maps Code */
	blocks.registerBlockType( 'cpgm/map', {
		title: 'CP Google Maps',
		icon: iconCPGM,
		category: 'cpgm',
		supports: {
			customClassName: false,
			className: false
		},

		attributes: {
			shortcode : {
				type : 'text'
			}
		},

		edit: function( props ) {
			var focus = props.focus;

			function onChangeMap(evt)
			{
				props.setAttributes({shortcode: evt.target.value});
			};

			if(typeof props.attributes.shortcode == 'undefined')
			{
				props.setAttributes({shortcode:cpm_generate_shortcode()});
			}

			return 	el(
						'textarea',
						{
							key 	: 'cpgm-shortcode',
							onChange: onChangeMap,
							value 	: props.attributes.shortcode,
							style	: {width:"100%", resize: "vertical"}
						}
					);
		},

		save: function( props ) {
			return props.attributes.shortcode || '[codepeople-post-map]';
		}
	});
} )(
	window.wp.blocks,
	window.wp.element
);