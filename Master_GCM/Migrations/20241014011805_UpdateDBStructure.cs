using System;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class UpdateDBStructure : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "ROLEID",
                table: "TRN_LOG");

            migrationBuilder.DropColumn(
                name: "DATEUPDATED",
                table: "TRN_HIST_ASSET");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSTYPE",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSTYPE2");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSSERIES",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSTYPE1");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSMODEL",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSSERIES2");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSCAPACITY",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSSERIES1");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSBRAND",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSMODEL2");

            migrationBuilder.RenameColumn(
                name: "ROLEID",
                table: "MST_USER",
                newName: "ROLE");

            migrationBuilder.AddColumn<string>(
                name: "ROLE",
                table: "TRN_LOG",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AlterColumn<string>(
                name: "PICADDED",
                table: "TRN_HIST_MAINTENANCE",
                type: "text",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer");

            migrationBuilder.AddColumn<string>(
                name: "GRAPHICSBRAND1",
                table: "TRN_DTL_SPEC",
                type: "text",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "GRAPHICSBRAND2",
                table: "TRN_DTL_SPEC",
                type: "text",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "GRAPHICSCAPACITY1",
                table: "TRN_DTL_SPEC",
                type: "text",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "GRAPHICSCAPACITY2",
                table: "TRN_DTL_SPEC",
                type: "text",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "GRAPHICSMODEL1",
                table: "TRN_DTL_SPEC",
                type: "text",
                nullable: true);

            migrationBuilder.AlterColumn<string>(
                name: "PICADDED",
                table: "TRN_DTL_SOFTWARE",
                type: "text",
                nullable: false,
                defaultValue: "",
                oldClrType: typeof(string),
                oldType: "text",
                oldNullable: true);

            migrationBuilder.AlterColumn<DateOnly>(
                name: "DATEUPDATED",
                table: "TRN_DTL_SOFTWARE",
                type: "date",
                nullable: true,
                oldClrType: typeof(DateOnly),
                oldType: "date");

            migrationBuilder.AlterColumn<string>(
                name: "PICADDED",
                table: "TRN_DTL_PICTURE",
                type: "text",
                nullable: false,
                defaultValue: "",
                oldClrType: typeof(string),
                oldType: "text",
                oldNullable: true);

            migrationBuilder.AlterColumn<DateOnly>(
                name: "DATEUPDATED",
                table: "TRN_DTL_PICTURE",
                type: "date",
                nullable: true,
                oldClrType: typeof(DateOnly),
                oldType: "date");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "ROLE",
                table: "TRN_LOG");

            migrationBuilder.DropColumn(
                name: "GRAPHICSBRAND1",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropColumn(
                name: "GRAPHICSBRAND2",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropColumn(
                name: "GRAPHICSCAPACITY1",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropColumn(
                name: "GRAPHICSCAPACITY2",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropColumn(
                name: "GRAPHICSMODEL1",
                table: "TRN_DTL_SPEC");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSTYPE2",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSTYPE");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSTYPE1",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSSERIES");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSSERIES2",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSMODEL");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSSERIES1",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSCAPACITY");

            migrationBuilder.RenameColumn(
                name: "GRAPHICSMODEL2",
                table: "TRN_DTL_SPEC",
                newName: "GRAPHICSBRAND");

            migrationBuilder.RenameColumn(
                name: "ROLE",
                table: "MST_USER",
                newName: "ROLEID");

            migrationBuilder.AddColumn<int>(
                name: "ROLEID",
                table: "TRN_LOG",
                type: "integer",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AlterColumn<int>(
                name: "PICADDED",
                table: "TRN_HIST_MAINTENANCE",
                type: "integer",
                nullable: false,
                oldClrType: typeof(string),
                oldType: "text");

            migrationBuilder.AddColumn<DateOnly>(
                name: "DATEUPDATED",
                table: "TRN_HIST_ASSET",
                type: "date",
                nullable: false,
                defaultValue: new DateOnly(1, 1, 1));

            migrationBuilder.AlterColumn<string>(
                name: "PICADDED",
                table: "TRN_DTL_SOFTWARE",
                type: "text",
                nullable: true,
                oldClrType: typeof(string),
                oldType: "text");

            migrationBuilder.AlterColumn<DateOnly>(
                name: "DATEUPDATED",
                table: "TRN_DTL_SOFTWARE",
                type: "date",
                nullable: false,
                defaultValue: new DateOnly(1, 1, 1),
                oldClrType: typeof(DateOnly),
                oldType: "date",
                oldNullable: true);

            migrationBuilder.AlterColumn<string>(
                name: "PICADDED",
                table: "TRN_DTL_PICTURE",
                type: "text",
                nullable: true,
                oldClrType: typeof(string),
                oldType: "text");

            migrationBuilder.AlterColumn<DateOnly>(
                name: "DATEUPDATED",
                table: "TRN_DTL_PICTURE",
                type: "date",
                nullable: false,
                defaultValue: new DateOnly(1, 1, 1),
                oldClrType: typeof(DateOnly),
                oldType: "date",
                oldNullable: true);
        }
    }
}
