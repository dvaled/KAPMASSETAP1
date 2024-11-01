using System;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class UpdateTrnAssetModels : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC");

            migrationBuilder.AlterColumn<string>(
                name: "ASSETSERIES",
                table: "TRN_ASSET",
                type: "text",
                nullable: true,
                oldClrType: typeof(string),
                oldType: "text");

            migrationBuilder.AlterColumn<string>(
                name: "ASSETSERIALNUMBER",
                table: "TRN_ASSET",
                type: "text",
                nullable: true,
                oldClrType: typeof(string),
                oldType: "text");

            migrationBuilder.AlterColumn<string>(
                name: "ASSETMODEL",
                table: "TRN_ASSET",
                type: "text",
                nullable: true,
                oldClrType: typeof(string),
                oldType: "text");

            migrationBuilder.AddColumn<DateOnly>(
                name: "DATEUPDATED",
                table: "TRN_ASSET",
                type: "date",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "PICADDED",
                table: "TRN_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AddColumn<string>(
                name: "PICUPDATED",
                table: "TRN_ASSET",
                type: "text",
                nullable: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC",
                column: "ASSETCODE",
                unique: true);
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropColumn(
                name: "DATEUPDATED",
                table: "TRN_ASSET");

            migrationBuilder.DropColumn(
                name: "PICADDED",
                table: "TRN_ASSET");

            migrationBuilder.DropColumn(
                name: "PICUPDATED",
                table: "TRN_ASSET");

            migrationBuilder.AlterColumn<string>(
                name: "ASSETSERIES",
                table: "TRN_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "",
                oldClrType: typeof(string),
                oldType: "text",
                oldNullable: true);

            migrationBuilder.AlterColumn<string>(
                name: "ASSETSERIALNUMBER",
                table: "TRN_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "",
                oldClrType: typeof(string),
                oldType: "text",
                oldNullable: true);

            migrationBuilder.AlterColumn<string>(
                name: "ASSETMODEL",
                table: "TRN_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "",
                oldClrType: typeof(string),
                oldType: "text",
                oldNullable: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC",
                column: "ASSETCODE");
        }
    }
}
