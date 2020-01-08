/**
 * BLOCK: powr-pack
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
import { APP_DETAILS } from '../app_details';
// import * as PowrIcons from '../powrIcons.js'
import PowrIcons from '../icons';

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */

APP_DETAILS.forEach(function(appDetail) {
  registerBlockType( `powrful/${appDetail.slug}`, {
    // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
    title: __( appDetail.common_name ), // Block title.
    icon: PowrIcons[appDetail.app_type], // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
    category: 'powrful-plugins', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
    keywords: [
      __( appDetail.common_name ),
      __( 'Plugins' ),
      __( 'Widget' ),
    ],

    /**
     * The edit function describes the structure of your block in the context of the editor.
     * This represents what the editor will render when the block is used.
     *
     * The "edit" property must be a valid function.
     *
     * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     */

    // Backend glutenberg render
    edit: function( props ) {
      props.setAttributes( { id: props.clientId } );

      if ( typeof loadPowr !== 'undefined' ) {
        window.loadPowr();
      }

      // Creates a <p class='wp-block-powrful-packs'></p>.
      return (
        <div className={ `powr-${appDetail.slug}` } id={ props.clientId }></div>
      );
    },

    /**
     * The save function defines the way in which the different attributes should be combined
     * into the final markup, which is then serialized by Gutenberg into post_content.
     *
     * The "save" property must be specified and must be a valid function.
     *
     * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     */

    // Frontend glutenberg render
    save: function( props ) {
      if ( typeof loadPowr !== 'undefined' ) {
        window.loadPowr();
      }

      return (
        <div className={ `powr-${appDetail.slug}` } id={ props.attributes.id }></div>
      );
    },
  } );
});
