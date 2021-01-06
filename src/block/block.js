import "./editor.scss";
import "./style.scss";

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

registerBlockType("cgb/block-gutenberg-card-block", {
	title: __("Card Block"),
	icon: "index-card",
	category: "common",
	keywords: [__("Card Block"), __("Card")],

	edit: (props) => {
		return (
			<div className={props.className}>
				<p>Hello From Backend</p>
			</div>
		);
	},

	save: (props) => {
		return (
			<div className={props.className}>
				<p>Hello from the frontend.</p>
			</div>
		);
	},
});
